<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Referral;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessReferralListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        if (!empty($event->user->referral_id)) {
            try {
                $this->createReferral($event->user, $event->user->referral_id);
            }
            catch (Exception $e) {
                Log::error("Process referral listener error: " . $e->getMessage());
            }
        }
    }

    private function createReferral(User $user, int $referralId): void
    {
        $referrer = User::findOrFail($referralId);

        $referrer->referrals()->create([
            'user_id' => $user->id,
            'level' => 1,
        ]);

        $this->createReferralHierarchy($referrer, $user, 2);
    }

    private function createReferralHierarchy(User $referrer, User $user, int $level): void
    {
        $referralReferrer = Referral::where('user_id', $referrer->id)->first();

        if (!$referralReferrer || $level > 3) {
            return;
        }

        Referral::create([
            'user_id' => $user->id,
            'referrer_id' => $referralReferrer->referrer->id,
            'level' => $level
        ]);

        $this->createReferralHierarchy($referralReferrer->referrer, $user, $level + 1);
    }
}
