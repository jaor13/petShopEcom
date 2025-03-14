<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Filament\Forms\Components\Card;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;

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


    public function placeOrder() {
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
    
        // Retrieve cart items
        $cart_items = CartManagement::getCartItemsFromDB();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
        $shipping_amount = 0; 
    
        // Check if the cart is empty
        if (count($cart_items) === 0) {
            session()->flash('error', 'Your cart is empty!');
            return redirect()->route('/');
        }
    
        // Create Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'grand_total' => $grand_total,
            'shipping_amount' => $shipping_amount,
            'payment_method' => $this->payment_method,
            'payment_status' => ($this->payment_method === 'cod') ? 'unpaid' : 'processing',
            'status' => 'new', 
            'currency' => 'PHP',
            'notes' => null, 
            'shipping_method' => 'standard',
        ]);
    
        // Create Address
        Address::create([
            'order_id' => $order->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'province' => $this->state,
            'zip_code' => $this->zip_code,
        ]);
    
        // Add Order Items
        foreach ($cart_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'variant_id' => null, // Use actual variant ID if applicable
                'quantity' => $item['quantity'],
                'unit_amount' => $item['unit_amount'],
                'total_amount' => $item['total_amount'],
            ]);
        }
    
        // Handle Cash on Delivery (COD)
        if ($this->payment_method === 'cod') {
            // Clear Cart
            CartManagement::clearCartItems();
    
            // Redirect with Success Message
            session()->flash('success', 'Your order has been placed successfully! Payment will be collected upon delivery.');
            return redirect()->route('order.success', ['order' => $order->id]);
        }
    
        // Handle Online Payment (PayMongo)
        $secretKey = config('services.paymongo.secret_key');
        $amount = $grand_total * 100; // Convert to centavos
    
        $data = [
            "data" => [
                "attributes" => [
                    "amount" => $amount,
                    "currency" => "PHP",
                    "description" => "Payment for Order #{$order->id}",
                    "remarks" => "Order Payment",
                    "checkout_url" => route('order.success', ['order' => $order->id]),
                ]
            ]
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/links");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Basic " . base64_encode($secretKey . ":")
        ]);
    
        $result = curl_exec($ch);
        curl_close($ch);
    
        $response = json_decode($result, true);
    
        // Check if Payment Link was created successfully
        if (isset($response['data']['attributes']['checkout_url'])) {
            return redirect()->away($response['data']['attributes']['checkout_url']);
        } else {
            session()->flash('error', 'Failed to create payment link. Please try again.');
            return redirect()->route('checkout');
        }
    }
    




    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromDB();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);

        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}
