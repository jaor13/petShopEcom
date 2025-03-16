<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title("Cart - Aricuz")]
class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;
    public $shipping_fee;
    public $selectAll = false;
    public $selected_items = [];

    public function mount() {
        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->selected_items = is_array(session()->get('selected_cart_items'))
            ? session()->get('selected_cart_items')
            : [];
        $this->updateTotals();
        $this->selectAll = count($this->selected_items) === count($this->cart_items);
    }

    private function updateTotals() {
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items) ?? 0;
        $this->shipping_fee = CartManagement::calculateShipping($this->selected_items) ?? 0;
    }

    public function updatedSelectedItems() {
        session()->put('selected_cart_items', $this->selected_items);
        $this->updateTotals();
        $this->selectAll = count((array) $this->selected_items) === count($this->cart_items);
    }

    public function toggleSelectAll() {
        if (count((array) $this->selected_items) === count($this->cart_items)) {
            $this->selected_items = [];
        } else {
            $this->selected_items = collect($this->cart_items)->pluck('cart_id')->toArray();
        }
        session()->put('selected_cart_items', $this->selected_items);
        $this->updateTotals();
    }

    public function removeItem($product_id, $variant_name = null) {
        usleep(200000);
        $this->cart_items = CartManagement::removeCartItem($product_id, $variant_name);
        $this->selected_items = array_filter($this->selected_items, function ($cart_id) {
            return collect($this->cart_items)->contains('cart_id', $cart_id);
        });
        session()->put('selected_cart_items', $this->selected_items);
        $this->updateTotals();
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }

    public function increaseQty($product_id, $variant_name = null) {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id, $variant_name);
        $this->updateTotals();
    }

    public function decreaseQty($product_id, $variant_name = null) {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id, $variant_name);
        $this->updateTotals();
    }

    public function render() {
        return view('livewire.cart-page');
    }
}
