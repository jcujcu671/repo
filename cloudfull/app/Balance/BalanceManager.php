<?php

namespace App\Balance;

use App\Balance\Contracts\BalanceContract;
use App\Balance\Exceptions\NotEnoughBalanceException;
use App\Dto\BalanceChangeResultDto;
use App\Models\Balance;
use Brick\Math\BigDecimal;
use Brick\Math\Exception\DivisionByZeroException;
use Brick\Math\Exception\NumberFormatException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BalanceManager implements BalanceContract
{
    private array $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function getBalance(int $userId, string $currency): Balance
    {
        return Balance::firstOrCreate([
            'user_id' => $userId,
            'currency' => strtoupper($currency),
        ]);
    }

    public function getBalances(int $userId): array
    {
        $balances = Balance::where('user_id', $userId)->get();

        $balancesByCurrency = [];

        foreach ($balances as $balance) {
            $balancesByCurrency[strtolower($balance->currency)] = $balance;
        }

        foreach ($this->currencies as $currency) {
            if (!isset($balancesByCurrency[$currency])) {
                $balancesByCurrency[strtolower($currency)] = Balance::firstOrCreate([
                    'user_id' => $userId,
                    'currency' => $currency,
                ]);
            }
        }

        return $balancesByCurrency;
    }

    /**
     * @throws NotEnoughBalanceException
     * @throws DivisionByZeroException
     * @throws NumberFormatException
     */
    public function increase(int $userId, string $currency, int|float|string $amount): BalanceChangeResultDto
    {
        return $this->changeBalance($userId, $currency, BigDecimal::of($amount));
    }

    /**
     * @throws NotEnoughBalanceException
     * @throws NumberFormatException
     * @throws DivisionByZeroException
     */
    public function decrease(int $userId, string $currency, int|float|string $amount): BalanceChangeResultDto
    {
        return $this->changeBalance($userId, $currency, BigDecimal::of(-$amount));
    }

    /**
     * @throws NotEnoughBalanceException
     */
    protected function changeBalance(int $userId, string $currency, BigDecimal $valueChange): BalanceChangeResultDTO
    {
        $balance = $this->getBalance($userId, $currency);

        $remainingBalance = $balance->value->minus($valueChange);

        if ($valueChange->isNegative() && $remainingBalance->isLessThan(0)) {
            throw new NotEnoughBalanceException($remainingBalance);
        }

        return DB::transaction(function () use ($userId, $currency, $valueChange, $balance) {
            $query = 'UPDATE `balances` SET ';
            $wheres = ['`user_id`=' . $userId, '`currency`=' . "'" . Str::upper($currency) . "'"];
            $updates = [];

            if ($valueChange->isNegative()) {
                $wheres[] = '`value` >= ' . $valueChange->multipliedBy(BigDecimal::of(-1))->toScale(16);
            }

            $updates[] = '`value` = @value := `value` + (' . $valueChange->toScale(16) . ')';

            $query .= implode(', ', $updates);
            $query .= ' WHERE ' . implode(' AND ', $wheres);

            $affectedRows = DB::update($query);

            if ($affectedRows != 1) {
                throw new NotEnoughBalanceException($balance->value);
            }

            $query = 'select @value as value';
            $values = DB::selectOne($query);

            $this->changeCachedBalanceValue($userId, $values->value, $currency);

            return new BalanceChangeResultDTO(true, $values->value, $valueChange);
        }, 3);

    }

    public function loadUserBalances(int $userId, bool $withRefresh = false): array
    {
        return Cache::rememberForever("user_balances_$userId", function () use ($userId) {
            return $this->getBalances($userId);
        });
    }

    public function cacheUserBalance(int $userId, Balance $balance): void
    {
        $balances = $this->loadUserBalances($userId);
        $balances[strtolower($balance->currency)] = $balance;

        Cache::forever("user_balances_$userId", $balances);
    }

    private function changeCachedBalanceValue(int $userId, string $newValue, string $currency): void
    {
        $balances = BalanceManagerFacade::loadUserBalances($userId);

        $balance = $balances[strtolower($currency)];
        $balance->value = $newValue;

        BalanceManagerFacade::cacheUserBalance($userId, $balance);
    }

    public function deleteBalancesFromCache(int $userId): void
    {
        Cache::delete("user_balances_$userId");
    }
}
