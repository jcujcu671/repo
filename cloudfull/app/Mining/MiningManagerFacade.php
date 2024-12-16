<?php

namespace App\Mining;

use App\Dto\MiningPowerChangeResultDto;
use App\Models\MiningPower;
use App\Models\UsedMiningPower;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

/**
 * Class MiningManagerFacade
 *
 * @method static MiningPower getMiningPower(int $userId)
 * @method static UsedMiningPower getUsedMiningPower(int $userId, string $currency)
 * @method static array getUsedMiningPowers(int $userId)
 * @method static MiningPowerChangeResultDTO increaseMiningPower(int $userId, float|int $amount)
 * @method static MiningPowerChangeResultDTO decreaseMiningPower(int $userId, float|int $amount)
 * @method static void allocateMiningPower(int $userId, string $currency, float|int $amount)
 * @method static void releaseMiningPower(int $userId, string $currency, float|int $amount)
 * @method static int getUsedPowersCount(int $userId)
 * @method static int getUnusedPowersCount(int $userId)
 * @method static float calculateMiningProfit(UsedMiningPower $power)
 * @method static array loadUsedPowers(int $userId)
 * @method static void cacheUsedPower(int $userId, UsedMiningPower $power)
 * @method static void deleteUsedPowersFromCache(int $userId)
 *
 * @see MiningManager
 */
class MiningManagerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MiningManager::class;
    }
}
