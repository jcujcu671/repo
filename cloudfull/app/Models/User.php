<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Balance\BalanceManagerFacade;
use App\Mining\MiningManagerFacade;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function bonuses(): HasMany
    {
        return $this->hasMany(Bonus::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    /**
     * @throws Exception
     */
    public function getTotalDepositAmountForLast180Days(): int
    {
        $deposits = $this->payments()->where('payment_type', 'deposit')->where('status', 'paid')->whereDate('created_at', '>=', now()->subDays(180))->get();
        $sum = 0;
        foreach ($deposits as $deposit) {
            $depositAmountUsd = getCurrencyRate($deposit->currency . '_usd') * $deposit->amount;
            $sum += $depositAmountUsd;
        }

        return $sum;
    }

    private function calculatePercentage(int $totalAmount): float
    {
        return match (true) {
            $totalAmount >= 3000 => 5.0,
            $totalAmount >= 750 => 4.5,
            $totalAmount >= 250 => 4.0,
            $totalAmount >= 25 => 3.5,
            $totalAmount >= 3 => 3.0,
            default => 2.0,
        };
    }

    /**
     * @throws Exception
     */
    public function getActivePlan(): float
    {
        $totalAmount = $this->getTotalDepositAmountForLast180Days();

        return $this->calculatePercentage($totalAmount);
    }

    protected static function booted(): void
    {
        static::deleting(function ($user) {
            BalanceManagerFacade::deleteBalancesFromCache($user->id);
            MiningManagerFacade::deleteUsedPowersFromCache($user->id);
        });
    }
}
