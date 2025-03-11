<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

#[Title("Cart - Aricuz")]
class CartPage extends Component
{

    use LivewireAlert;

    public $cart_items = [];
    public $grand_total;

    public function mount(){
        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($product_id, $variant_name = null) {
        usleep(200000); // 0.2 second delay (200ms)

        $this->cart_items = CartManagement::removeCartItem($product_id, $variant_name);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);

        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);

        $this->alert('success', 'Product removed from cart.', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    
    }
    public function increaseQty($product_id, $variant_name = null) {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id, $variant_name);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items,);
    }

    public function decreaseQty($product_id, $variant_name = null) {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id, $variant_name);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
