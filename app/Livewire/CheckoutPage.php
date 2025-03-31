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
    public $product_id;
    public $variant_name = null;
    public $quantity = 1;
    public $total_items;
    public $subtotal;
    public $grand_total;

    public function mount()
    {
        $product_id = request()->query('product_id');
        $quantity = request()->query('quantity', 1);
        $variant_name = request()->query('variant', null);

        if ($product_id) {
            // "Buy Now" logic
            $product = Product::with('variants')->find($product_id);

            if ($product) {
                $variant = $product->variants->where('name', $variant_name)->first();
                $unit_price = $variant ? $variant->price : $product->price;
                $variant_id = $variant ? $variant->id : null;
                $stock = $variant ? $variant->stock_quantity : $product->stock_quantity;
                $image = $variant && !empty($variant->image) ? $variant->image : ($product->images[0] ?? 'default.png');

                $this->selected_items = [
                    [
                        'product_id' => $product->id,
                        'variant_id' => $variant_id,
                        'name' => $product->product_name,
                        'slug' => $product->slug,
                        'image' => $image,
                        'quantity' => $quantity,
                        'unit_amount' => $unit_price,
                        'total_amount' => $unit_price * $quantity,
                        'variant_name' => $variant_name,
                        'stock_quantity' => $stock,
                    ]
                ];

                // Calculate totals for "Buy Now"
                $this->subtotal = $unit_price * $quantity;
                $total_quantity = array_sum(array_column($this->selected_items, 'quantity'));
                $this->shipping_amount = 50 + max(0, ($total_quantity - 1) * 20);

                $this->grand_total = $this->subtotal + $this->shipping_amount;
                $this->total_items = count($this->selected_items);

                // Store "Buy Now" items in session
                session()->put('buy_now_items', $this->selected_items);
            }
        } else {
            $cart_items = array_filter(CartManagement::getCartItemsFromDB(), function ($item) {
                return in_array($item['cart_id'], $this->selected_items);
            });
            // Normal Cart Checkout
            $this->selected_items = session()->get('selected_cart_items', []);

            // Calculate totals from cart items
            $this->subtotal = CartManagement::calculateGrandTotal($this->selected_items);
            $this->shipping_amount = session()->get('shipping_fee', 0);
            $this->grand_total = CartManagement::calculateGrandTotal($this->selected_items) + $this->shipping_amount;
            $this->total_items = count($this->selected_items);
        }

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
        if (empty($this->selected_items)) {
            session()->flash('error', 'No items to checkout.');
            return redirect()->route('/');
        }

        // Calculate totals
        // $grand_total = array_sum(array_column($this->selected_items, 'total_amount')) + $this->shipping_amount;

        $this->validate([
            'payment_method' => 'required',
        ]);

        $this->validate([
            'payment_method' => 'required',
        ]);

        // Create Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'grand_total' => $this->grand_total,
            'shipping_amount' => $this->shipping_amount,
            'payment_method' => $this->payment_method,
            'payment_status' => ($this->payment_method === 'cod') ? 'unpaid' : 'processing',
            'status' => 'new',
            'currency' => 'PHP',
            'notes' => null,
            'shipping_method' => 'standard',
        ]);

        // Check if the selected items are from the cart
        $cart_items = array_filter(CartManagement::getCartItemsFromDB(), function ($item) {
            return in_array($item['cart_id'], $this->selected_items);
        });

        // Clear only if items were from the cart
        if (!empty($cart_items)) {
            CartManagement::clearCartItems($this->selected_items);
        }

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
        $selected_items = is_array($this->selected_items) ? $this->selected_items : json_decode($this->selected_items, true);

        // Combine cart items and "Buy Now" items
        $order_items = !empty($cart_items) ? $cart_items : $selected_items;

        foreach ($order_items as $item) {
            if (!is_array($item)) {
                continue; // Skip invalid items
            }

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
            return redirect()->route('my-purchases');
        }

        // Handle Online Payment (PayMongo)
        $secretKey = config('services.paymongo.secret_key');
        $amount = $this->grand_total * 100;

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
        $total_items = count($cart_items); // Calculate total items
        session()->forget('buy_now_items');
        return view('livewire.checkout-page', compact('cart_items', 'grand_total', 'shipping_amount', 'total_items'));
    }
}