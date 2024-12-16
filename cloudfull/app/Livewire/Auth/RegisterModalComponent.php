<?php

namespace App\Livewire\Auth;

use App\Events\UserRegistered;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RegisterModalComponent extends Component
{
    use LivewireAlert;

    public string $email;
    public string $password;
    public string $password_confirmation;
    public bool $terms;

    public bool $isOpen = false;

    protected $listeners = ['auth.register-modal-open' => 'openModal', 'auth.register-modal-close' => 'closeModal'];

    protected array $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'terms' => 'accepted',
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

    public function register(): void
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $user->referral_id = session()->pull('referral_id');

        UserRegistered::dispatch($user);

        auth()->login($user);

        $this->alert('success', 'Registration successful!');

        $this->closeModal();
        $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register-modal-component');
    }
}
