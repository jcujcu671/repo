<?php

namespace App\Casts;

use Brick\Math\BigDecimal;
use Brick\Math\Exception\MathException;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class DecimalCast implements CastsAttributes
{
    /**
     * @throws MathException
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): ?BigDecimal
    {
        if ($value === null) {
            return null;
        }

        return BigDecimal::of($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): float|int|string|null
    {
        if ($value instanceof BigDecimal) {
            return (string) $value;
        }

        if (is_numeric($value)) {
            return $value;
        }

        return null;
    }
}
