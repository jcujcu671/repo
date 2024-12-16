<?php

namespace App\Livewire\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class PasswordResetModalComponent extends Component
{
    use LivewireAlert;

    public string $email;
    public string $token;

    public string $password;
    public string $password_confirmation;

    public bool $isOpen = false;

    public function mount(): void
    {
        if (session()->has('reset_token') && session()->has('reset_email')) {
            $this->token = session('reset_token');
            $this->email = session('reset_email');

            $this->isOpen = true;
        }
    }

    public function closeModal(): void
    {
        $this->resetValidation();
        $this->reset();
    }

    public function passwordReset(): void
    {
        $this->validate([
            'email' => 'required|string|email',
            'token' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            ['email' => $this->email, 'password' => $this->password, 'token' => $this->token],
            function ($user, $password) {
                $user->forceFill(['password' => Hash::make($password)])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $this->alert('success', 'Password has been reset.');
        }
        elseif ($status === Password::INVALID_TOKEN) {
            $this->alert('error', 'Token has expired or is invalid.');
        }
        else {
            $this->alert('error', 'Failed to reset password.');
        }

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.auth.password-reset-modal-component');
    }
}
