<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $total_count = 0;

    public function mount(){
        $this->total_count = count(CartManagement::getCartItemsFromDB());
        $this->profile_picture_url = asset('storage/' . (Auth::user()->profile_picture ?? 'assets/images/default-profile.png'));
    }

    #[On('update-cart-count')]
    public function updateCartCount($total_count){
        // CartManagement::clearCartItems();
        $this->total_count = $total_count;
    }

    // Listen for profileUpdated event to refresh profile picture
    protected $listeners = ['profileUpdated' => 'updateProfilePicture'];

    public function updateProfilePicture()
    {
        $this->profile_picture_url = asset('storage/' . (Auth::user()->profile_picture ?? 'assets/images/default-profile.png'));
    }
    
    public function render()
    {
        return view('livewire.partials.navbar',[
        'categories' => Category::where('is_active', true)->get(['id', 'name', 'slug']),
        ]);
    }
}
