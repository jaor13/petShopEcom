<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Helpers\LikedProductManagement;
use App\Models\LikedProducts;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Partials\Navbar;

#[Title("Liked Products - Aricuz")]

class LikedProduct extends Component
{

    use LivewireAlert;

    public $products = [];

    public $selectedProducts = [];

    public $editMode = false;


    public function mount()
    {
        if (Auth::check()) {
            $likedProductIds = LikedProductManagement::showLiked();

            $this->products = Product::whereIn('id', $likedProductIds)->get();
        }
    }

    public function toggleEditMode()
    {
        $this->editMode = !$this->editMode;
        if (!$this->editMode) {
            $this->selectedProducts = [];
        } else {
            $this->selectedProducts = [];
        }
    }

    public function deleteSelected()
    {
        if (count($this->selectedProducts) > 0) {
            LikedProductManagement::removeFromLikedProductsTable($this->selectedProducts);

            $this->products = $this->products->filter(function ($product) {
                return !in_array($product->id, $this->selectedProducts);
            });

            $count = count($this->selectedProducts);
            $message = $count === 1
                ? 'Product successfully removed from liked products!'
                : 'Selected products successfully removed from liked products!';

            $this->alert('success', $message, [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);

            $this->selectedProducts = [];
            
            if ($this->products->isEmpty()) {
                $this->editMode = false;  
            }
        } else {
            $this->alert('warning', 'No products selected for deletion.', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function addToCart($product_id)
    {
        $product = Product::with('variants')->find($product_id);

        if ($product && $product->variants->count() > 0) {
            return redirect()->to(url('product/' . $product->slug . '?variant_alert=1'));
        }

        usleep(200000); // 0.2 second delay (200ms)
        $total_count = CartManagement::addItemToCart($product_id);
        // dd($total_count, $product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product added to cart successfully!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.liked-product', [
            'products' => $this->products
        ]);
    }
}