<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileNavigation extends Component
{
    public $activeSection = 'my-account';

    // Enable query string binding
    protected $queryString = ['activeSection'];

    public function setActiveSection($section)
    {
        $this->activeSection = $section;
    }

    public function render()
    {
        return view('livewire.profile-navigation');
    }
}
