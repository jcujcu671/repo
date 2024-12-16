<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LoginModalComponent extends Component
{
    use LivewireAlert;

    public string $email;
    public string $password;
    public bool $isOpen = false;

    protected $listeners = ['auth.login-modal-open' => 'openModal', 'auth.login-modal-close' => 'closeModal'];

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required'
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

    public function openForgotPasswordModal(): void
    {
        $this->dispatch('auth.forgot-password-modal-open');
        $this->closeModal();
    }

    public function login(): void
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->alert('success', 'Welcome back!');
            $this->redirect('/dashboard');
        }
        else {
            $this->addError('password', 'Invalid credentials.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-modal-component');
    }
}
