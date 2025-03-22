<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Http\Request;


#[Title("Profile - Aricuz")]
class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.user-profile');
    }
}
