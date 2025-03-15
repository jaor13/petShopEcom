<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Cart - Aricuz")]
class CartPage extends Component
{

    public $cart_items = [];
    public $grand_total;
    public $shipping_fee;


    public function mount(){
        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->updateTotals();
    }

    private function updateTotals() {
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items) ?? 0;
        $this->shipping_fee = CartManagement::calculateShipping($this->cart_items) ?? 0;
    }

    public function removeItem($product_id, $variant_name = null) {
        usleep(200000); // 0.2 second delay (200ms)

        $this->cart_items = CartManagement::removeCartItem($product_id, $variant_name);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->updateTotals(); // Ensure both totals and shipping fee are updated


        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    
    }
    public function increaseQty($product_id, $variant_name = null) {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id, $variant_name);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items,);
        $this->updateTotals(); // Ensure both totals and shipping fee are updated
    }

    public function decreaseQty($product_id, $variant_name = null) {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id, $variant_name);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->updateTotals(); // Ensure both totals and shipping fee are updated

    }

    public function render()
    {
        return view('livewire.cart-page');
    }


}
