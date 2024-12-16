<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutComponent extends Component
{
    protected $listeners = ['logout'];

    public function logout(): void
    {
        Auth::logout();

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.components.logout-component');
    }
}
