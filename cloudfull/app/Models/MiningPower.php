<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MiningPower extends Model
{
    use HasFactory;

    protected $table = 'mining_powers';
    protected $fillable = [
        'user_id',
        'value',
    ];

    protected $attributes = [
        'value' => '0.00',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
