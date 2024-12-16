<?php

namespace App\Balance\Exceptions;

use Exception;

class NotEnoughBalanceException extends Exception
{
    private float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;

        parent::__construct();
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
