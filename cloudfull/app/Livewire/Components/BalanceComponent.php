<?php

namespace App\Livewire\Components;

use App\Balance\BalanceManagerFacade;
use App\Mining\MiningManagerFacade;
use Livewire\Component;

class BalanceComponent extends Component
{
    protected $listeners = ['refreshBalances'];

    public array $usedPowers;

    public function mount(): void
    {
        $this->loadMappedUsedPowers(auth()->id());
    }

    public function refreshBalances(): void
    {
        $this->loadMappedUsedPowers(auth()->id());
        $balances = BalanceManagerFacade::loadUserBalances(auth()->id());
        $usedPowers = MiningManagerFacade::loadUsedPowers(auth()->id());

        if (!empty($usedPowers)) {
            foreach ($usedPowers as $power) {
                $profit = MiningManagerFacade::calculateMiningProfit($power);

                $balance = $balances[strtolower($power->currency)];
                $balance->value = $balance->value->plus($profit);

                $power->mining_started_at = now();

                MiningManagerFacade::cacheUsedPower(auth()->id(), $power);
                BalanceManagerFacade::cacheUserBalance(auth()->id(), $balance);
            }
        }
    }

    private function loadMappedUsedPowers(int $userId): void
    {
        $usedPowers = MiningManagerFacade::loadUsedPowers($userId);
        foreach ($usedPowers as $power) {
            $this->usedPowers[strtolower($power->currency)] = $power->value;
        }
    }

    public function render()
    {
        return view('livewire.components.balance-component');
    }
}
