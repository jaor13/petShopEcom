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
            $likedProductId = $likedProduct->id; // Get the primary key of liked_products table

            if (in_array($likedProductId, array_column($this->selectedProducts, 'id'))) {
                // Remove the liked product entry from selection
                $this->selectedProducts = array_filter($this->selectedProducts, function ($item) use ($likedProductId) {
                    return $item['id'] !== $likedProductId;
                });
            } else {
                // Add liked product entry to selection
                $this->selectedProducts[] = ['id' => $likedProductId];
            }

            $this->dispatch('updatedSelectedProducts'); // Force Livewire update
        }
    }

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedProducts = \App\Models\LikedProduct::where('user_id', Auth::id())
                ->pluck('id') // Get liked_products table IDs
                ->map(fn($id) => ['id' => $id]) // Convert to array format used in selection
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

        // Clear selected products
        $this->selectedProducts = [];

        // Fetch updated liked products
        $this->likedProducts = LikedProductManagement::showLiked();

        // Show success alert
        $this->alert('success', 'Selected products successfully deleted from liked products!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        // Dispatch event to update UI
        $this->dispatch('updatedLikedProducts');
    }



    public function render()
    {
        if (empty($this->likedProducts)) {
            return view('livewire.liked-product', [
                'products' => collect([]) // Return an empty collection
            ]);
        }

        $products = Product::where('is_active', 1)
            ->whereIn('id', $this->likedProducts)
            ->get();

        return view('livewire.liked-product', [
            'products' => $products
        ]);
    }

}
