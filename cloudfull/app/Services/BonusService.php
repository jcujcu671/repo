<?php

namespace App\Services;

use App\Mining\MiningManagerFacade;
use App\Models\Bonus;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Cache;

class BonusService
{
    public const BONUS_FIRST_LEVEL = 1;
    public const BONUS_SECOND_LEVEL = 2;
    public const BONUS_THIRD_LEVEL = 3;

    /**
     * @throws Exception
     */
    public function addBonusPowersToUser(int $userId): int
    {
        $user = User::find($userId);

        if (!$user) {
            throw new Exception("Пользователь с ID $userId не найден");
        }

        $bonusLevel = $this->getBonusLevel($userId);
        $amount = $this->calculateBonusAmount($bonusLevel);

        try {
            Bonus::create([
                'user_id' => $user->id,
                'value' => $amount,
            ]);

            MiningManagerFacade::increaseMiningPower($userId, $amount);
        } catch (Exception $e) {
            throw new Exception("Ошибка при добавлении бонусных возможностей пользователю: " . $e->getMessage());
        }

        $this->setInactiveBonusTimestamp($userId, $bonusLevel);

        return $amount;
    }

    protected function calculateBonusAmount(int $bonusLevel): int
    {
        if ($bonusLevel == self::BONUS_SECOND_LEVEL) {
            return $this->getRandomNumberWithProbability(3, 15, 50);
        }

        if ($bonusLevel == self::BONUS_THIRD_LEVEL) {
            return $this->getRandomNumberWithProbability(5, 30, 10);
        }

        return $this->getRandomNumberWithProbability(1, 5, 90);
    }

    public function getBonusLevel(int $userId): int
    {
        $user = User::find($userId);

        if (!$user) {
            return self::BONUS_FIRST_LEVEL;
        }

        $depositSum = $user->getTotalDepositAmountForLast180Days();
        if ($depositSum > 25) {
            return self::BONUS_SECOND_LEVEL;
        }

        $qualifiedReferralCount = $user->referrals()
            ->whereHas('user.payments', function ($query) {
                $query->where('payment_type', 'deposit');
                $query->where('amount', '>', 25);
            })
            ->where('level', 1)
            ->count();

        if ($qualifiedReferralCount > 10) {
            return self::BONUS_THIRD_LEVEL;
        }

        return self::BONUS_FIRST_LEVEL;
    }

    protected function getRandomNumberWithProbability(int $min,  int $max, int $probability): int
    {
        $rand = mt_rand(0, 100);
        if ($rand < $probability) {
            return mt_rand(floor($max * 0.7), $max);
        }

        return mt_rand($min, floor($max * 0.7));
    }

    public function getInactiveBonusTimestamp(int $userId): bool|int
    {
        return Cache::get("bonus_inactive_$userId", false);
    }

    protected function setInactiveBonusTimestamp(int $userId, int $level): void
    {
        $expiration = now()->addHours($level == 1 ? 6 : 24)->timestamp;

        Cache::put("bonus_inactive_$userId", $expiration, now()->addHours($level == 1 ? 6 : 24));
    }
}
