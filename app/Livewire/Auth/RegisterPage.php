<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Register - Aricuz")]
class RegisterPage extends Component
{
    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
