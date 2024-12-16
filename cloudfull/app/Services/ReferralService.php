<?php

namespace App\Services;

use App\Models\User;

class ReferralService
{
    public function affiliateDeposits(int $userId): array
    {
        $user = User::find($userId);

        $affiliateDeposits = [];

        foreach ($user->referrals as $referral) {
            foreach ($referral->user->payments as $payment) {
                if ($payment->payment_type == 'deposit') {
                    $bonus = $this->calculateBonus($payment->amount, $referral->level);

                    $affiliateDeposits[] = [
                        'system' => $payment->currency,
                        'time' => $payment->created_at,
                        'deposit' => $payment->amount,
                        'commission' => $this->calculateCommission($referral->level),
                        'bonus' => number_format($bonus, 32, 16),
                        'comment' => $referral->level . ' LVL',
                    ];
                }
            }
        }

        return $affiliateDeposits;
    }

    protected function calculateCommission(int $referralLevel): float
    {
        return match ($referralLevel) {
            1 => 12.0,
            2 => 3.0,
            3 => 1.0,
            default => 0.0,
        };
    }

    protected function calculateBonus(float $depositAmount, int $referralLevel): float
    {
        return $depositAmount * $this->calculateCommission($referralLevel) / 100;
    }
}
