<?php

namespace App\Livewire;

use Livewire\Component;
class ProfileNavigation extends Component
{
    public $activeSection = 'my-account'; 

    public function mount()
    {
        if (request()->routeIs('my-purchases')) {
            $this->activeSection = 'my-purchases';
        }
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