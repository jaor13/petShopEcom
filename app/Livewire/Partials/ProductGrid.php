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
    public $type;
    public $limit;
    public $excludeProductId;
    public $sortPrice;

    public function mount($query = null, $category = null, $type = null, $limit = null, $excludeProductId = null, $sortPrice = null)
    {
        $this->query = $query;
        $this->category = $category;
        $this->type = $type;
        $this->limit = $limit;
        $this->excludeProductId = $excludeProductId;
        $this->sortPrice = $sortPrice;
    }


    // add to cart
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
        $products = Product::where('is_active', 1);

        if ($this->category) {
            $products->whereHas('categories', function ($q) {
                $q->where('name', 'like', '%' . $this->category . '%');
            });
        }
        
        if ($this->query) {
            $products->where(function ($q) {
                $q->whereHas('categories', function ($q) {
                    $q->where('name', 'like', "%{$this->query}%");
                })
                ->orWhere('product_name', 'like', "%{$this->query}%");
            });
        }
        
        
        if ($this->type === 'latest') {
            $products->orderBy('created_at', 'desc'); 
        } elseif ($this->type === 'best_sellers') {
            $products->orderBy('sold_count', 'desc'); 
        }
        
        if ($this->excludeProductId) {
            $products->where('id', '!=', $this->excludeProductId);
        }

        if ($this->type === 'latest') {
            $products->orderBy('created_at', 'desc');
        } elseif ($this->type === 'best_sellers') {
            $products->orderBy('sold_count', 'desc');
        }

        if ($this->sortPrice === 'asc') {
            $products->orderBy('price', 'asc');
        } elseif ($this->sortPrice === 'desc') {
            $products->orderBy('price', 'desc');
        }

        if ($this->limit) {
            $products->limit($this->limit);
        }

        return view('livewire.partials.product-grid', [
            'products' => $products->get()
        ]);
    }
}
