<?php

namespace App\Balance;

use App\Dto\BalanceChangeResultDto;
use App\Models\Balance;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Balance getBalance(int $userId, string $currency)
 * @method static array getBalances(int $userId)
 * @method static BalanceChangeResultDTO increase(int $userId, string $currency, int|float|string $amount)
 * @method static BalanceChangeResultDTO decrease(int $userId, string $currency, int|float|string $amount)
 * @method static array loadUserBalances(int $userId)
 * @method static void cacheUserBalance(int $userId, Balance $balance)
 * @method static void deleteBalancesFromCache(int $userId)
 *
 * @see BalanceManager
 */
class BalanceManagerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BalanceManager::class;
    }
}
