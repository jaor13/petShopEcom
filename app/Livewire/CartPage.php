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
    public $selected_items = [];
    public $grand_total;
    public $selectAll = false;
    public $shipping_fee;

    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->selected_items = is_array(session()->get('selected_cart_items'))
            ? session()->get('selected_cart_items')
            : [];

        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();

        $this->selectAll = count($this->selected_items) === count($this->cart_items);
    }

    public function updatedSelectedItems()
    {
        session()->put('selected_cart_items', $this->selected_items);
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();

        $this->selectAll = count((array) $this->selected_items) === count($this->cart_items);
    }

    public function toggleSelectAll()
    {
        if (count((array) $this->selected_items) === count($this->cart_items)) {
            $this->selected_items = [];
        } else {
            $this->selected_items = collect($this->cart_items)->pluck('cart_id')->toArray();
        }

        session()->put('selected_cart_items', $this->selected_items);
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();
    }

    public function updateSummary()
    {
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();
    }

    public function goToCheckout()
    {
        if (empty($this->selected_items)) {
            $this->alert('error', 'No items selected for checkout.', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }
        session()->put('selected_cart_items', $this->selected_items);
        session()->put('shipping_fee', $this->shipping_fee); // Store shipping fee in session
        // dd($this->selected_items);       
        return redirect()->route('checkout');
    }

    public function increaseQty($product_id, $variant_name = null)
    {
        CartManagement::incrementQuantityToCartItem($product_id, $variant_name);

        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();
    }

    public function decreaseQty($product_id, $variant_name = null)
    {
        CartManagement::decrementQuantityToCartItem($product_id, $variant_name);

        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();
    }

    public function removeItem($product_id, $variant_name = null)
    {
        usleep(200000); // 0.2 second delay (200ms)

        $this->cart_items = CartManagement::removeCartItem($product_id, $variant_name);

        $this->selected_items = array_filter($this->selected_items, function ($cart_id) {
            return collect($this->cart_items)->contains('cart_id', $cart_id);
        });

        session()->put('selected_cart_items', $this->selected_items);

        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();

        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);

        $this->alert('success', 'Product removed from cart.', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function removeSelectedItems()
    {
        if (empty($this->selected_items)) {
            $this->alert('error', 'No items selected for removal.', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        foreach ($this->selected_items as $cart_id) {
            $this->cart_items = CartManagement::removeCartItemById($cart_id);
        }

        $this->selected_items = array_filter($this->selected_items, function ($cart_id) {
            return collect($this->cart_items)->contains('cart_id', $cart_id);
        });

        session()->put('selected_cart_items', $this->selected_items);
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
        $this->shipping_fee = $this->calculateShipping();

        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
        $this->alert('success', 'Selected items removed.', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function calculateShipping()
    {
        if (empty($this->selected_items)) {
            return 0; // No shipping fee if no items are selected
        }
        
        $base_rate = 50;
        $additional_rate = 20;
        $total_quantity = 0;

        foreach ($this->selected_items as $cart_id) {
            $item = collect($this->cart_items)->firstWhere('cart_id', $cart_id);
            if ($item) {
                $total_quantity += $item['quantity'];
            }
        }

        if ($total_quantity <= 1) {
            return $base_rate;
        }

        return $base_rate + ($total_quantity - 1) * $additional_rate;
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}