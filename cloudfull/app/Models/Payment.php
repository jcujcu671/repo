<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'order_id',
        'amount',
        'currency',
        'payment_type',
        'payment_system',
        'payment_details',
        'status',
    ];

    protected $attributes = [
        'amount' => '0.00',
    ];

    protected $casts = [
        'payment_details' => 'array',
    ];
}
