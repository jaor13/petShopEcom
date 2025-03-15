<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileNavigation extends Component
{

    public $activeSection = 'my-account';

    public function mount()
    {
        $this->activeSection = request()->query('section', 'my-account');
    }

    public function setActiveSection($section)
    {
        $this->activeSection = $section;
    }
    public function render()
    {
        return view('livewire.profile-navigation');
    }
}
