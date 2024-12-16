<?php

namespace App\Providers;

use App\Mining\MiningManager;
use Illuminate\Support\ServiceProvider;

class MiningServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(MiningManager::class, function () {
            $currencies = config('balance.currencies');

            return new MiningManager($currencies);
        });
    }
}
