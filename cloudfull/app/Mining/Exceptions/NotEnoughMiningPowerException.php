<?php

namespace App\Mining\Exceptions;

use Exception;

class NotEnoughMiningPowerException extends Exception
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;

        parent::__construct();
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
