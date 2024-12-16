<?php

namespace App\Mining\Contracts;

interface MiningContract
{
    public function getMiningPower(int $userId);

    public function getUsedMiningPower(int $userId, string $currency);

    public function getUsedMiningPowers(int $userId);

    public function increaseMiningPower(int $userId, float|int $amount);

    public function decreaseMiningPower(int $userId, float|int $amount);

    public function allocateMiningPower(int $userId, string $currency, float|int $amount);

    public function releaseMiningPower(int $userId, string $currency, float|int $amount);
}
