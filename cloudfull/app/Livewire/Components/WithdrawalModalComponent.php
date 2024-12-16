<?php

namespace App\Livewire\Components;

use App\Livewire\Traits\LivewireBalance;
use Brick\Math\BigDecimal;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class WithdrawalModalComponent extends Component
{
    use LivewireBalance, LivewireAlert;

    public bool $isOpen = false;

    public string $balance;

    public string $amount;
    public string $currency;
    public string $address;

    protected $listeners = ['open-withdrawal-modal' => 'openModal'];

    public function openModal(string $currency): void
    {
        $this->saveCachedBalance(auth()->id());

        $this->currency = $currency;
        $this->balance = (string) $this->getBalance(auth()->id(), $currency);

        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->resetValidation();
        $this->reset();
    }

    public function withdrawalAll(): void
    {
        $this->amount = number_format((float)$this->balance, 16);
    }

    /**
     * @throws \Exception
     */
    public function withdraw(string $currency): void
    {
        $this->validate([
            'amount' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) {
                    if (BigDecimal::of(number_format((float) $this->balance))->isGreaterThanOrEqualTo($value)) {
                        $fail('The ' . $attribute . ' must not be greater than ' . number_format((float)$this->balance) . '.');
                    }
                },
            ],
            'address' => 'required|string|min:16',
        ]);

        $currencyUsdRate = getCurrencyRate($currency . '_usd');
        $amountUsd = (int) $this->amount * $currencyUsdRate;

        if ($amountUsd <= 5) {
            $this->addError('amount', 'Amount must be greater than 5$');
            return;
        }

        $this->alert('success', 'Done!');
    }

    public function render()
    {
        return view('livewire.components.withdrawal-modal-component');
    }
}
