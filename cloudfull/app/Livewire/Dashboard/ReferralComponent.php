<?php

namespace App\Livewire\Dashboard;

use App\Services\ReferralService;
use Livewire\Component;

class ReferralComponent extends Component
{
    public array $affiliateDeposits;

    private ReferralService $service;

    public function boot(): void
    {
        $this->service = app(ReferralService::class);
    }

    public function mount(): void
    {
        $this->affiliateDeposits = $this->service->affiliateDeposits(auth()->id());
    }

    public function render()
    {
        return view('livewire.dashboard.referral-component');
    }
}
