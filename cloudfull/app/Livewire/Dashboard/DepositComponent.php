<?php

namespace App\Livewire\Dashboard;

use App\Classes\Paykassa\Paykassa;
use App\Services\DepositService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DepositComponent extends Component
{
    use LivewireAlert;

    private DepositService $service;

    public bool $isOpen = false;

    public string $amount;

    public string $currency;
    public string $wallet;

    protected $listeners = ['openDepositModal'];

    public function boot(): void
    {
        $this->service = app(DepositService::class);
    }

    /**
     * @throws Exception
     */
    public function openDepositModal(string $amount, string $currency): void
    {
        $this->validate([
            'amount' => ['required', 'numeric', 'min:6'],
        ]);

        $this->amount = $amount;
        $this->currency = $currency;

        try {
            $this->wallet = $this->createOrder((float) $amount, $currency);
        }
        catch (Exception $e) {
            $this->alert('error', 'Error in process deposit.');
            Log::error('Deposit error: ' . $e->getMessage());
            return;
        }

        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->resetValidation();
        $this->reset();
    }

    /**
     * @throws Exception
     */
    private function createOrder(float $amount, string $currency): string
    {
        return DB::transaction(function () use ($amount, $currency) {
            $deposit = $this->service->createOrder(auth()->id(), $amount, $currency);
            $response = Paykassa::sci()->createAddress($amount, $this->getPaymentSystem($currency), $currency, $deposit->id);
            if ($response['error']) {
                throw new Exception($response['message']);
            }

            return $response['data']['wallet'];
        });
    }

    private function getPaymentSystem($currency): ?string
    {
        $systems = ['btc' => 'bitcoin', 'eth' => 'ethereum', 'ltc' => 'litecoin', 'doge' => 'dogecoin', 'trx' => 'tron_trc20', 'bnb' => 'binancecoin'];

        if (!isset($systems[$currency])) {
            throw new InvalidArgumentException("Invalid currency [$currency].");
        }

        return $systems[$currency];
    }

    public function render()
    {
        return view('livewire.dashboard.deposit-component');
    }
}
