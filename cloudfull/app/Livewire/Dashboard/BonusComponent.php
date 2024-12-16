<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Services\BonusService;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class BonusComponent extends Component
{
    public int $amount;
    public string|null $remainingTime;
    public bool $isOpen = false;
    public int $bonusLevel = 1;

    private BonusService $service;
    public Collection $userBonuses;
    private int $inactiveTimestamp;

    public function boot(): void
    {
        $this->service = app(BonusService::class);

        $this->inactiveTimestamp = $this->service->getInactiveBonusTimestamp(auth()->id());
        $this->bonusLevel = $this->service->getBonusLevel(auth()->id());
        $this->userBonuses = $this->getUserBonuses(auth()->id());
    }

    /**
     * @throws Exception
     */
    public function openModal(): void
    {
        if ($this->service->getInactiveBonusTimestamp(auth()->id()) !== false) {
            return;
        }

        $this->isOpen = true;

        $this->amount = $this->service->addBonusPowersToUser(auth()->id());

        $this->refreshUserBonuses(auth()->id());
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    private function getUserBonuses(int $userId): Collection
    {
        return Cache::remember("user_bonuses_$userId", now()->addHours(6), function () use ($userId) {
            $user = User::find($userId);

            return $user->bonuses;
        });
    }

    private function refreshUserBonuses(int $userId): void
    {
        $user = User::find($userId);

        Cache::put("user_bonuses_$userId", $user->bonuses, 60 * 6);
    }

    private function calculateRemainingTime(): void
    {
        if ($this->inactiveTimestamp) {
            $currentTime = now()->timestamp;
            $remainingSeconds = max(0, $this->inactiveTimestamp - $currentTime);
            $this->remainingTime = gmdate("H:i:s", $remainingSeconds);
        } else {
            $this->remainingTime = null;
        }
    }

    public function render()
    {
        $this->calculateRemainingTime();

        return view('livewire.dashboard.bonus-component');
    }
}
