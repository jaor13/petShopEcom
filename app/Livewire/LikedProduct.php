<?php

namespace App\Livewire;

use App\Helpers\LikedProductManagement;
use App\Models\LikedProducts;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Title("Liked Products - Aricuz")]

class LikedProduct extends Component
{

    public $likedProducts = [];
    public $selectedProducts = [];

    public function mount()
    {
        if (Auth::check()) {
            $this->likedProducts = LikedProductManagement::showLiked();
        }
    }

    public function render()
    {
        $products = Product::where('is_active', 1);

        if (!empty($this->likedProducts)) {
            $products->whereIn('id', $this->likedProducts);
        }

        return view('livewire.liked-product', [
            'products' => $products->get() // Fetch the results
        ]);
    }

}
