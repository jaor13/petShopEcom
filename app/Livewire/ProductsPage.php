<?php

namespace App\Livewire;

use Livewire\Component;
use Request;

class ProductsPage extends Component
{
    public $category;
    public $query;

    // public function mount(Request $request)
    // {
    //     $this->category = $request->query('category', 'All Categories');
    //     $this->query = $request->query('query', '');
    // }

    public function render()
    {
        return view('livewire.products-page');
    }
}
