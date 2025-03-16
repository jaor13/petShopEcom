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
use App\Models\Product;

#[Title("Checkout - Aricuz")]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $city;
    public $province;
    public $zip_code;
    public $payment_method;
    public $selected_items = [];
    public $shipping_amount;

    public $use_existing_address = false;
    public $showAddressModal = false;
    public $is_editing = false;

    public function mount()
    {
        $this->selected_items = session()->get('selected_cart_items', []);
        $this->shipping_amount = session()->get('shipping_fee', 0); 

        $user = auth()->user();
        if ($user && $user->address_id) {
            $address = Address::find($user->address_id);
            if ($address) {
                $this->first_name = $address->first_name;
                $this->last_name = $address->last_name;
                $this->phone = $address->phone;
                $this->street_address = $address->street_address;
                $this->city = $address->city;
                $this->province = $address->province;
                $this->zip_code = $address->zip_code;
                $this->use_existing_address = true;
            }
        }
    }

    public function openAddressModal($isEditing = false)
    {
        $this->is_editing = $isEditing;
        $this->showAddressModal = true;
    }

    public function closeAddressModal()
    {
        $this->showAddressModal = false;
        $this->is_editing = false;
    }

    public function saveAddress()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
        ]);

        $user = auth()->user();
        if ($this->use_existing_address && $user->address_id) {
            $address = Address::find($user->address_id);
            $address->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'province' => $this->province,
                'zip_code' => $this->zip_code,
            ]);
        } else {
            $address = Address::create([
                'user_id' => $user->id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'province' => $this->province,
                'zip_code' => $this->zip_code,
            ]);
            $user->update(['address_id' => $address->id]);
        }

        $this->use_existing_address = true;
        $this->closeAddressModal();
    }

    public function placeOrder()
    {
        $cart_items = CartManagement::getCartItemsFromDB();
        $grand_total = CartManagement::calculateGrandTotal($this->selected_items) + $this->shipping_amount;

        $shipping_amount = $this->shipping_amount;

        $this->validate([
            'payment_method' => 'required',
        ]);

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

        CartManagement::clearCartItems();

        ProcessOrderStatus::dispatch($order)->delay(now()->addMinutes(1));

        // Create or update Address
        $user = auth()->user();
        if ($this->use_existing_address && $user->address_id) {
            $address = Address::find($user->address_id);
            $address->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'province' => $this->province,
                'zip_code' => $this->zip_code,
            ]);
        } else {
            $address = Address::create([
                'user_id' => $user->id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'province' => $this->province,
                'zip_code' => $this->zip_code,
            ]);
            $user->update(['address_id' => $address->id]);
        }

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
        $amount = $grand_total  * 100; 

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

        if ($result === false) {
            $curlError = curl_error($ch);
            curl_close($ch);
            
            Log::error('cURL error', ['error' => $curlError]);
            session()->flash('error', 'An error occurred while processing your payment. Please try again.');
            return redirect()->route('checkout');
        }

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
        $cart_items = array_filter(CartManagement::getCartItemsFromDB(), function ($item) {
            return in_array($item['cart_id'], $this->selected_items);
        });

        $grand_total = CartManagement::calculateGrandTotal($this->selected_items) + $this->shipping_amount;
        $shipping_amount = $this->shipping_amount; // Ensure shipping_amount is defined

        return view('livewire.checkout-page', compact('cart_items', 'grand_total', 'shipping_amount'));
    }
}
