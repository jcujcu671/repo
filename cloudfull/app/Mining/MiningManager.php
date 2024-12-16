<?php

namespace App\Mining;

use App\Dto\MiningPowerChangeResultDto;
use App\Mining\Contracts\MiningContract;
use App\Mining\Exceptions\NotEnoughMiningPowerException;
use App\Models\MiningPower;
use App\Models\UsedMiningPower;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MiningManager implements MiningContract
{
    private array $currencies;

    const SECONDS_PER_DAY = 86400;
    const POWER_USD_RATE = 0.025;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function getMiningPower(int $userId): MiningPower
    {
        return MiningPower::firstOrCreate([
            'user_id' => $userId,
        ]);
    }

    public function getUsedMiningPower(int $userId, string $currency): UsedMiningPower
    {
        return UsedMiningPower::firstOrCreate([
            'user_id' => $userId,
            'currency' => $currency,
        ]);
    }

    public function getUsedMiningPowers(int $userId): array
    {
        $usedMiningPowers = UsedMiningPower::where('user_id', $userId)->get();
        $usedPowers = [];

        foreach ($usedMiningPowers as $usedPower) {
            $usedPowers[strtolower($usedPower->currency)] = $usedPower;
        }

        foreach ($this->currencies as $currency) {
            if (!isset($usedPowers[strtolower($currency)])) {
                $usedPowers[strtolower($currency)] = UsedMiningPower::firstOrCreate([
                    'user_id' => $userId,
                    'currency' => $currency,
                ]);
            }
        }

        return $usedPowers;
    }

    /**
     * @throws NotEnoughMiningPowerException
     */
    public function increaseMiningPower(int $userId, float|int $amount): MiningPowerChangeResultDTO
    {
        return $this->changeMiningPower($userId, $amount);
    }

    /**
     * @throws NotEnoughMiningPowerException
     */
    public function decreaseMiningPower(int $userId, float|int $amount): MiningPowerChangeResultDTO
    {
        return $this->changeMiningPower($userId, -$amount);
    }

    /**
     * @throws NotEnoughMiningPowerException
     */
    protected function changeMiningPower(int $userId, float $valueChange): MiningPowerChangeResultDTO
    {
        $miningPower = $this->getMiningPower($userId);

        $remainingPower = $miningPower->value + $valueChange;

        if ($valueChange < 0 && $remainingPower < 0) {
            throw new NotEnoughMiningPowerException($remainingPower);
        }

        return DB::transaction(function () use ($userId, $valueChange, $miningPower) {
            $query = 'UPDATE `mining_powers` SET ';

            $wheres = [
                '`user_id` = ' . $userId
            ];

            if ($valueChange < 0) {
                $wheres[] = '`value` >= ' . abs($valueChange);
            }

            $query .= ' `value` = `value` + ' . $valueChange;
            $query .= ' WHERE ' . implode(' AND ', $wheres);

            $affectedRows = DB::update($query);

            if ($affectedRows != 1) {
                throw new NotEnoughMiningPowerException($miningPower->value);
            }

            $newPower = $miningPower->value += $valueChange;

            return new MiningPowerChangeResultDTO(true, $newPower, $valueChange);
        }, 3);
    }

    public function allocateMiningPower(int $userId, string $currency, float|int $amount): void
    {
        DB::transaction(function () use ($userId, $currency, $amount) {
            $this->decreaseMiningPower($userId, $amount);

            $usedPower = $this->getUsedMiningPower($userId, $currency);

            $usedPower->value += $amount;
            $usedPower->save();
        });
    }

    public function releaseMiningPower(int $userId, string $currency, float|int $amount): void
    {
        DB::transaction(function () use ($userId, $currency, $amount) {
            $usedPower = $this->getUsedMiningPower($userId, $currency);

            if ($usedPower->value < $amount) {
                throw new NotEnoughMiningPowerException($usedPower->value);
            }

            $usedPower->value -= $amount;
            $usedPower->save();

            $this->increaseMiningPower($userId, $amount);
        });
    }

    public function getUsedPowersCount(int $userId): int
    {
        return UsedMiningPower::where('user_id', $userId)->sum('value');
    }

    public function getUnusedPowersCount(int $userId): int
    {
        return MiningPower::where('user_id', $userId)->sum('value');
    }

    /**
     * @throws Exception
     */
    public function calculateMiningProfit(UsedMiningPower $power): float
    {
        $currency = strtolower($power->currency);

        $activePlan = $power->user->getActivePlan();

        $rateInCurrency = number_format(getCurrencyRate("usd_$currency"), 16);

        $powerValue = bcmul($power->value, '1', 0);

        $usdFromPower = bcmul($powerValue, self::POWER_USD_RATE, 16);

        $currencyTokenAmount = bcmul($usdFromPower, $rateInCurrency, 16);

        $percentValue = bcdiv($activePlan, self::SECONDS_PER_DAY, 16);

        $profitPerSecond = bcmul($currencyTokenAmount, bcdiv($percentValue, '100', 16), 16);

        return (float) $profitPerSecond;
    }

    public function loadUsedPowers(int $userId): array
    {
        return Cache::rememberForever("user_used_powers_$userId", function () use ($userId) {
            return $this->getUsedMiningPowers($userId);
        });
    }

    public function cacheUsedPower(int $userId, UsedMiningPower $power): void
    {
        $usedPowers = $this->loadUsedPowers($userId);
        $usedPowers[strtolower($power->currency)] = $power;

        Cache::forever("user_used_powers_$userId", $usedPowers);
    }

    public function deleteUsedPowersFromCache(int $userId): void
    {
        Cache::delete("user_used_powers_$userId");
    }
}

