<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsedMiningPower extends Model
{
    use HasFactory;

    protected $table = 'used_mining_powers';
    protected $fillable = [
        'user_id',
        'value',
        'currency',
        'mining_started_at',
    ];

    protected $attributes = [
        'value' => '0',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
