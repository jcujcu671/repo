<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ForgotPasswordModalComponent extends Component
{
    use LivewireAlert;

    public string $email;
    public string $password;
    public bool $isOpen = false;

    protected $listeners = ['auth.forgot-password-modal-open' => 'openModal', 'auth.forgot-password-modal-close' => 'closeModal'];

    protected array $rules = [
        'email' => 'required|email|exists:users,email',
    ];

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->resetValidation();
        $this->reset();
    }

    public function sendResetLink(): void
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        $this->closeModal();

        if ($status === Password::RESET_LINK_SENT) {
            $this->alert('success', 'Reset link sent to your email.');
        } else {
            $this->alert('error', 'Failed to send reset link.');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-modal-component');
    }
}
