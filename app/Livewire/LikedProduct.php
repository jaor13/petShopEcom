<?php

namespace App\Livewire;

use App\Helpers\LikedProductManagement;
use App\Models\LikedProducts;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Title("Liked Products - Aricuz")]

class LikedProduct extends Component
{

    use LivewireAlert;

    public $products = [];

    public $selectedProducts = [];

    public $editMode = false;
    public $isAllSelected = false;


    public function mount()
    {
        if (Auth::check()) {
            $likedProductIds = LikedProductManagement::showLiked();

            $this->products = Product::whereIn('id', $likedProductIds)->get();
            $this->isAllSelected = false;
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


    public function toggleSelectAll()
    {
        if ($this->isAllSelected) {
            $this->selectedProducts = $this->products->pluck('id')->toArray();
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
            $this->isAllSelected = false;
        } else {
            $this->alert('warning', 'No products selected for deletion.', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.liked-product', [
            'products' => $this->products
        ]);
    }
}