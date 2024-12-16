<?php

namespace App\Livewire\Components;

use App\Balance\BalanceManagerFacade;
use App\Livewire\Traits\LivewireBalance;
use App\Mining\MiningManager;
use App\Mining\MiningManagerFacade;
use Brick\Math\BigDecimal;
use Brick\Math\Exception\RoundingNecessaryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ReinvestModalComponent extends Component
{
    use LivewireBalance, LivewireAlert;

    public bool $isOpen;

    public string $balance;

    public string $amount;
    public string $currency;

    protected $listeners = ['open-reinvest-modal' => 'openModal'];

    public function openModal(string $currency): void
    {
        $this->currency = $currency;
        $this->balance = $this->getBalance(auth()->id(), $currency);

        $this->saveCachedBalance(auth()->id());

        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->resetValidation();
        $this->reset();
    }

    public function reinvestAll(): void
    {
        $this->amount = number_format((float) $this->balance, 16);
    }

    /**
     * @throws Exception
     */
    public function reinvest(string $currency): void
    {
        $this->validate([
            'amount' => ['required', 'numeric', 'min:0', function ($attribute, $value, $fail) {
                if (BigDecimal::of(number_format((float) $this->balance))->isGreaterThanOrEqualTo($value)) {
                    $fail('The ' . $attribute . ' must not be greater than ' . number_format((float)$this->balance) . '.');
                }
            }],
        ]);

        $currencyUsdRate = getCurrencyRate($currency . '_usd');
        $amountUsd = (int) $this->amount * $currencyUsdRate;

        if ($amountUsd <= 0.025) {
            $this->addError('amount', 'Amount must be greater than 0.025$');
            return;
        }

        DB::transaction(function () use ($currency, $amountUsd) {
            $ghs = $amountUsd / MiningManager::POWER_USD_RATE;

            MiningManagerFacade::increaseMiningPower(auth()->id(), (int) $ghs);
            BalanceManagerFacade::decrease(auth()->id(), $currency, $this->amount);

            $this->alert('success', 'Reinvest successfully!');
        });

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.components.reinvest-modal-component');
    }
}
