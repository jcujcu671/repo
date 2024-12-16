<?php

namespace App\Livewire\Dashboard;

use App\Balance\BalanceManagerFacade;
use App\Livewire\Traits\LivewireBalance;
use App\Mining\Exceptions\NotEnoughMiningPowerException;
use App\Mining\MiningManagerFacade;
use App\Models\UsedMiningPower;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DashboardComponent extends Component
{
    use LivewireAlert, LivewireBalance;

    public int $totalPowersCount;
    public int $usedPowersCount;
    public int $unusedPowersCount;

    public array $usedPowers;
    public array $balances;

    public function mount(): void
    {
        $this->initializeComponent();
    }

    public function boot(): void
    {
        $this->saveCachedBalance(auth()->id());
    }

    public function incrementPower(string $currency): void
    {
        try {
            MiningManagerFacade::allocateMiningPower(auth()->id(), $currency, 1);

            $this->cacheUsedPower(auth()->id(), $currency);
            $this->loadMappedUsedPowers(auth()->id());
            $this->refreshPowersCount();
        } catch (NotEnoughMiningPowerException $e) {
            $this->alert('error', 'Not enough mining power.');
            return;
        }
    }

    public function decrementPower(string $currency): void
    {
        try {
            MiningManagerFacade::releaseMiningPower(auth()->id(), $currency, 1);

            $this->cacheUsedPower(auth()->id(), $currency);
            $this->loadMappedUsedPowers(auth()->id());
            $this->refreshPowersCount();
        } catch (NotEnoughMiningPowerException $e) {
            $this->alert('error', 'No used mining power available.');
            return;
        }
    }

    public function allocatePowers(string $amount, string $currency): void
    {
        if (!is_numeric($amount)) {
            $this->loadMappedUsedPowers(auth()->id());
            return;
        }

        $amount = (int)$amount;

        $usedPower = MiningManagerFacade::getUsedMiningPower(auth()->id(), $currency);

        try {
            if ($amount > $usedPower->value) {
                $delta = $amount - $usedPower->value;
                MiningManagerFacade::allocateMiningPower(auth()->id(), $currency, $delta);

            } else {
                $delta = $usedPower->value - $amount;
                MiningManagerFacade::releaseMiningPower(auth()->id(), $currency, $delta);
            }

            $this->cacheUsedPower(auth()->id(), $currency);
        } catch (NotEnoughMiningPowerException $e) {
            $this->loadMappedUsedPowers(auth()->id());
            $this->alert('error', 'Not enough mining power.');
            return;
        }

        $this->loadMappedUsedPowers(auth()->id());
        $this->refreshPowersCount();
    }

    public function allocateAllPowers(string $currency): void
    {
        try {
            MiningManagerFacade::allocateMiningPower(auth()->id(), $currency, $this->unusedPowersCount);

            $this->cacheUsedPower(auth()->id(), $currency);
            $this->loadMappedUsedPowers(auth()->id());
            $this->refreshPowersCount();
        } catch (NotEnoughMiningPowerException $e) {
            $this->alert('error', 'Not enough mining power.');
            return;
        }
    }

    private function initializeComponent(): void
    {
        $this->balances = BalanceManagerFacade::loadUserBalances(auth()->id());

        $this->loadMappedUsedPowers(auth()->id());
        $this->refreshPowersCount();
    }

    private function refreshPowersCount(): void
    {
        $this->usedPowersCount = MiningManagerFacade::getUsedPowersCount(auth()->id());
        $this->unusedPowersCount = MiningManagerFacade::getUnusedPowersCount(auth()->id());
        $this->totalPowersCount = $this->unusedPowersCount + $this->usedPowersCount;
    }

    private function loadMappedUsedPowers(int $userId): void
    {
        $usedPowers = MiningManagerFacade::loadUsedPowers($userId);
        foreach ($usedPowers as $power) {
            $this->usedPowers[strtolower($power->currency)] = $power->value;
        }
    }

    private function cacheUsedPower(int $userId, string $currency): void
    {
        $usedPowers = MiningManagerFacade::loadUsedPowers($userId);

        $power = MiningManagerFacade::getUsedMiningPower($userId, $currency);

        $usedPowers[$currency] = $power;

        Cache::forever("user_used_powers_$userId", $usedPowers);
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-component');
    }
}
