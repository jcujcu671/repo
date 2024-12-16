<?php

namespace App\Dto;

use Brick\Math\BigDecimal;

class BalanceChangeResultDto
{
    public bool $success;
    public string $changedBalance;
    public string $valueChange;

    public function __construct(bool $success, string $changedBalance, string $valueChange)
    {
        $this->success = $success;
        $this->changedBalance = $changedBalance;
        $this->valueChange = $valueChange;
    }
}
