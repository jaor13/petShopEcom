<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Filament\Forms\Components\Card;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Checkout - Aricuz")]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $city;
    public $state;
    public $province;
    public $zip_code;
    public $payment_method;
    public $selected_items = [];

    public function mount()
    {
        $this->selected_items = session()->get('selected_cart_items', []);
    }


    public function placeOrder()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'payment_method' => 'required',
        ]);
    }

    public function render()
    {
        $cart_items = array_filter(CartManagement::getCartItemsFromDB(), function ($item) {
            return in_array($item['cart_id'], $this->selected_items);
        });

        $grand_total = CartManagement::calculateGrandTotal($this->selected_items);

        return view('livewire.checkout-page', compact('cart_items', 'grand_total'));
    }


}
