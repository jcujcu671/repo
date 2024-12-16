<?php

namespace App\Models;

use App\Casts\DecimalCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Balance extends Model
{
    use HasFactory;

    protected $table = 'balances';
    protected $fillable = [
        'user_id',
        'currency',
        'value',
    ];

    protected $attributes = [
        'value' => '0.00',
    ];

    protected $casts = [
        'value' => DecimalCast::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
