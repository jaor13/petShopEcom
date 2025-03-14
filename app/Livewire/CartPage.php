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

    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->selected_items = session()->get('selected_cart_items', []);
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
    }


    public function updatedSelectedItems()
    {
        session()->put('selected_cart_items', $this->selected_items);
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
    }
    public function updateSummary()
    {
        // Just trigger a re-render
    }



    // public function placeOrder()
    // {
    //     // Get selected cart item IDs
    //     $cartItemIds = CartManagement::getCartItemIds();
    //     // Debugging
    //     dd($cartItemIds);
    // }

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
        // dd($this->selected_items);       
        return redirect()->route('checkout');
    }



    public function removeItem($product_id, $variant_name = null)
    {
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
    public function increaseQty($product_id, $variant_name = null)
    {
        CartManagement::incrementQuantityToCartItem($product_id, $variant_name);

        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
    }

    public function decreaseQty($product_id, $variant_name = null)
    {
        CartManagement::decrementQuantityToCartItem($product_id, $variant_name);

        $this->cart_items = CartManagement::getCartItemsFromDB();
        $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items);
    }


    public function render()
    {
        return view('livewire.cart-page');
    }
}
