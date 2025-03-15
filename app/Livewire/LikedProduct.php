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
            $this->selectedProducts = [];
            $this->selectAll = false;
        }
    }

    public function toggleProductSelection($productId)
    {
        $likedProduct = \App\Models\LikedProduct::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($likedProduct) {
            $likedProductId = $likedProduct->id;

            if (in_array($likedProductId, array_column($this->selectedProducts, 'id'))) {
                $this->selectedProducts = array_filter($this->selectedProducts, function ($item) use ($likedProductId) {
                    return $item['id'] !== $likedProductId;
                });
            } else {
                $this->selectedProducts[] = ['id' => $likedProductId];
            }
            $this->dispatch('updatedSelectedProducts');
        }
    }

    public function toggleSelectAll()
    {
        $this->selectAll = !$this->selectAll;

        if ($this->selectAll) {
            $this->selectedProducts = \App\Models\LikedProduct::where('user_id', Auth::id())
                ->pluck('id')
                ->map(fn($id) => ['id' => $id])
                ->toArray();
        } else {
            $this->selectedProducts = [];
        }
    }

    public function deleteSelected()
    {
        if (!Auth::check()) {
            $this->alert('error', 'You need to log in to delete liked products.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        if (empty($this->selectedProducts)) {
            $this->alert('warning', 'No products selected for deletion.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        $likedProductIds = array_map(fn($product) => $product['id'], $this->selectedProducts);

        LikedProductManagement::removeFromLikedProductsTable($likedProductIds);

        $this->selectedProducts = [];

        $this->likedProducts = LikedProductManagement::showLiked();

        $this->alert('success', 'Selected products successfully deleted from liked products!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->dispatch('updatedLikedProducts');
    }

    public function render()
    {
        if (empty($this->likedProducts)) {
            return view('livewire.liked-product', [
                'products' => collect([]) 
            ]);
        }

        $products = Product::where('is_active', 1)
            ->whereIn('id', $this->likedProducts)
            ->get()
            ->map(function ($product) {
                $likedProduct = \App\Models\LikedProduct::where('user_id', auth()->id())
                    ->where('product_id', $product->id)
                    ->first();
                $product->liked_product_id = $likedProduct ? $likedProduct->id : null; 
                return $product;
            });

        return view('livewire.liked-product', [
            'products' => $products
        ]);
    }
}
