<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Helpers\LikedProductManagement;
use App\Livewire\Partials\Navbar;
use App\Models\LikedProducts;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

#[Title("Product Detail - Aricuz")]

class ProductDetailPage extends Component
{

    use LivewireAlert;

    public $slug;

    public $quantity = 1;

    public $variant_name = null;
    public $variant_price;
    public $stock_quantity;

    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $this->slug = $slug;
        $this->variant_price = $product->price;
        $this->stock_quantity = $product->stock_quantity;
    }

    public function increaseQty()
    {
        $this->quantity++;
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function selectVariant($variantName, $price, $stock)
    {
        if ($this->variant_name === $variantName) {
            $product = Product::where('slug', $this->slug)->first();
            $this->variant_name = null;
            $this->variant_price = $product->price;
            $this->stock_quantity = $product->stock_quantity;
        } else {
            $this->variant_name = $variantName;
            $this->variant_price = $price;
            $this->stock_quantity = $stock;
        }
    }

    public function addToCart($product_id)
    {
        // dd($product_id);
        // dd($this->variant_name);
        usleep(200000); // 0.2-second delay (200ms)

        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity, $this->variant_name, $this->variant_price);
        // dd($total_count, $this->quantity);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product added to cart successfully!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    // Add a product to the liked table
    public function addToLiked($productId)
    {
        $result = LikedProductManagement::addToLikedProductsTable($productId);

        if (isset($result['error'])) {
            $this->alert('error', $result['error'], [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        } else {
            $this->alert('success', $result['success'], [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->first(),
        ]);
    }
}
