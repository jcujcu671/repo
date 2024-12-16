<?php

namespace App\Balance\Contracts;

interface BalanceContract
{
    public function getBalance(int $userId, string $currency);

    public function getBalances(int $userId);

    public function increase(int $userId, string $currency, int|float|string $amount);

    public function decrease(int $userId, string $currency, int|float|string $amount);
}
