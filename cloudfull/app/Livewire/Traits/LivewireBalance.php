<?php

namespace App\Livewire\Traits;

use App\Balance\BalanceManagerFacade;
use App\Mining\MiningManagerFacade;
use Brick\Math\BigDecimal;
use Carbon\Carbon;

trait LivewireBalance
{
    private function getBalance(int $userId, string $currency): BigDecimal
    {
        $balances = BalanceManagerFacade::loadUserBalances($userId);

        return $balances[$currency]->value;
    }

    private function saveCachedBalance(int $userId): void
    {
        $balances = BalanceManagerFacade::loadUserBalances($userId);
        $usedPowers = MiningManagerFacade::loadUsedPowers($userId);

        foreach ($usedPowers as $currency => $power) {
            $profit = MiningManagerFacade::calculateMiningProfit($power);
            if ($profit > 0) {
                $balance = $balances[$currency];

                $miningMiningStartedAt = Carbon::parse($power->mining_started_at);
                $miningMiningStartedAtSeconds = $miningMiningStartedAt->diffInSeconds(now());

                $balance->value = $balance->value->plus($profit * $miningMiningStartedAtSeconds);

                $power->mining_started_at = now();

                $power->save();
                $balances[$currency]->save();

                MiningManagerFacade::cacheUsedPower($userId, $power);
                BalanceManagerFacade::cacheUserBalance($userId, $balance);
            }
        }
    }
}
