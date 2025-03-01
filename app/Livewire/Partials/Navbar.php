<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.partials.navbar',[
        'categories' => Category::where('is_active', true)->get(['id', 'name', 'slug']),
        ]);
    }
}
