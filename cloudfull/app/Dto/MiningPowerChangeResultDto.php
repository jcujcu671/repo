<?php

namespace App\Dto;

class MiningPowerChangeResultDto
{
    public bool $success;
    public int $changedBalance;
    public int $valueChange;

    public function __construct(bool $success, int $changedBalance, int $valueChange)
    {
        $this->success = $success;
        $this->changedBalance = $changedBalance;
        $this->valueChange = $valueChange;
    }
}
