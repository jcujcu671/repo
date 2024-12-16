<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\User;

class DepositService
{
    protected array $currencies;

    public function __construct()
    {
        $this->currencies = config('balance.currencies');
    }

    public function getUserAllPaymentsByUserId(int $userId)
    {
        $user = User::find($userId);

        return $user->payments()->get();
    }

    public function createOrder(int $userId, int $amount, string $currency): Payment
    {
        return Payment::create([
            'user_id' => $userId,
            'amount' => $amount,
            'currency' => $currency,
            'payment_type' => 'deposit',
            'payment_system' => 'paykassa',
        ]);
    }
}
