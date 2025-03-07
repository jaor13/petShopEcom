<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProductGrid extends Component
{

    use LivewireAlert;

    public $query;
    public $category;

    public function mount($query = null, $category = null)
    {
        $this->query = $query;
        $this->category = $category;
    }

    // Add to cart
    public function addToCart($product_id) {
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
    $products = Product::where('is_active', 1);

    // Check if the query matches a category name
    $matchingCategories = \App\Models\Category::where('name', 'like', '%' . $this->query . '%')->pluck('id');

    $products->where(function ($query) use ($matchingCategories) {
        // If a category is selected, filter by that category first
        if ($this->category) {
            $query->whereHas('categories', function ($q) {
                $q->where('name', 'like', '%' . $this->category . '%');
            });

            // If the user is searching within a selected category, only match product names
            if ($this->query) {
                $query->where('product_name', 'like', '%' . $this->query . '%');
            }
        } else {
            // If no category is selected, allow searching by product name or category name
            if ($matchingCategories->isNotEmpty()) {
                $query->orWhereHas('categories', function ($q) use ($matchingCategories) {
                    $q->whereIn('id', $matchingCategories);
                });
            }

            if ($this->query) {
                $query->orWhere('product_name', 'like', '%' . $this->query . '%');
            }
        }
    });

    return view('livewire.partials.product-grid', [
        'products' => $products->get()
    ]);
}


}
