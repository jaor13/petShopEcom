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

    public $editMode = false;
    public $selectAll = false;

    public function mount()
    {
        if (Auth::check()) {
            $this->likedProducts = LikedProductManagement::showLiked();
        }
    }

    public function toggleEditMode()
    {
        $this->editMode = !$this->editMode;
        if (!$this->editMode) {
            $this->selectedProducts = []; // Clear selected products when canceling
            $this->selectAll = false;
        }
    }

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedProducts = array_map(fn($product) => $product['id'], Product::where('is_active', 1)->whereIn('id', $this->likedProducts)->get()->toArray());
        } else {
            $this->selectedProducts = [];
        }
    }

    public function deleteSelected()
    {
        if (!empty($this->selectedProducts)) {
            LikedProduct::whereIn('product_id', $this->selectedProducts)->where('user_id', Auth::id())->delete();
            $this->selectedProducts = [];
            $this->likedProducts = LikedProductManagement::showLiked(); // Refresh liked products list
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
