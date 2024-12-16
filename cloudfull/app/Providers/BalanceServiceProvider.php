<?php

namespace App\Providers;

use App\Balance\BalanceManager;
use Illuminate\Support\ServiceProvider;

class BalanceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BalanceManager::class, function () {
            $currencies = config('balance.currencies');

            return new BalanceManager($currencies);
        });
    }
}
