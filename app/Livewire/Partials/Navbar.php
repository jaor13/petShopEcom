<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $total_count = 0;

    public function mount(){
        $this->total_count = count(CartManagement::getCartItemsFromCookie());
    }

    #[On('update-cart-count')]
    public function updateCartCount($total_count){
        // CartManagement::clearCartItems();
        $this->total_count = $total_count;
    }

    public function render()
    {
        return view('livewire.partials.navbar',[
        'categories' => Category::where('is_active', true)->get(['id', 'name', 'slug']),
        ]);
    }
}
