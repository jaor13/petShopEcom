<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Filament\Forms\Components\Card;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Jobs\ProcessOrderStatus;
use Illuminate\Support\Facades\Log;

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
    
        // Check if the cart is empty
        if (count($cart_items) === 0) {
            session()->flash('error', 'Your cart is empty!');
            return redirect()->route('/');
        }

        $num_items = collect($cart_items)->sum('quantity'); // Sum up all quantities
        $base_rate = 50; // Fixed base shipping fee
        $additional_rate = 10; // Extra charge per additional item
    
        $shipping_amount = $base_rate + (($num_items - 1) * $additional_rate);
    
        // Create Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'grand_total' => $grand_total + $shipping_amount, // Add shipping
            'shipping_amount' => $shipping_amount,
            'payment_method' => $this->payment_method,
            'payment_status' => ($this->payment_method === 'cod') ? 'unpaid' : 'processing',
            'status' => 'new', 
            'currency' => 'PHP',
            'notes' => null, 
            'shipping_method' => 'standard',
        ]);

        CartManagement::clearCartItems();

        ProcessOrderStatus::dispatch($order)->delay(now()->addMinutes(1));
    
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
                'variant_id' => $item['variant_id'] ?? null, 
                'quantity' => $item['quantity'],
                'unit_amount' => $item['unit_amount'],
                'total_amount' => $item['total_amount'],
            ]);
        }
    
        // Handle Cash on Delivery (COD)
        if ($this->payment_method === 'cod') {
            CartManagement::clearCartItems();
            return redirect()->route('my-purchases');
        }
    
       // Handle Online Payment (PayMongo)
        $secretKey = config('services.paymongo.secret_key');
        $amount = ($grand_total + $shipping_amount) * 100; 

        $data = [
            "data" => [
                "attributes" => [
                    "amount" => $amount,
                    "currency" => "PHP",
                    "description" => "Payment for Order #{$order->id}",
                    "remarks" => "Order Payment",
                    "metadata" => [
                        "reference_number" => $order->id, 
                    ],
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
        $result = curl_exec($ch);

        if ($result === false) {
            $curlError = curl_error($ch);
            curl_close($ch);
            
            Log::error('cURL error', ['error' => $curlError]);
            session()->flash('error', 'An error occurred while processing your payment. Please try again.');
            return redirect()->route('checkout');
        }

        curl_close($ch);
        $response = json_decode($result, true);

        curl_close($ch);

        $response = json_decode($result, true);

        // Check if Payment Link was created successfully
        if (isset($response['data']['attributes']['checkout_url'])) {
            // Store the PayMongo reference number
            if (isset($response['data']['attributes']['reference_number'])) {
                $order->update([
                    'paymongo_reference' => $response['data']['attributes']['reference_number'],
                ]);
            }
            return redirect()->away($response['data']['attributes']['checkout_url']);
        } else {
            Log::error('PayMongo failed to create payment link', [
                'response' => $response,
                'order_id' => $order->id
            ]);
            session()->flash('error', 'Failed to create payment link. Please try again.');
            return redirect()->route('checkout');
        }

    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromDB();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
    
        $num_items = collect($cart_items)->sum('quantity');
        $base_rate = 50;
        $additional_rate = 10;
        $shipping_amount = $base_rate + (($num_items - 1) * $additional_rate);
    
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
            'shipping_amount' => $shipping_amount, // Pass shipping amount
        ]);
    }
    
    
}
