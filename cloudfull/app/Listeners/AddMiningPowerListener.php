<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mining\MiningManagerFacade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class AddMiningPowerListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        MiningManagerFacade::increaseMiningPower($event->user->id, 180);
    }
}
