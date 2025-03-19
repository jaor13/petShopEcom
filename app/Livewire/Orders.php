<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Orders extends Component
{
    public $status = 'all'; // Default tab
    public $orders = [];
    public $selectedOrderId = null;


    public function mount()
    {
        $this->fetchOrders();
    }

    public function fetchOrders()
    {
        // Get orders for the authenticated user
        $query = Order::where('user_id', Auth::id())
            ->with(['items.product', 'items.variant', 'user.address']) // Eager load user and address relationships
            ->orderBy('created_at', 'desc');

        if ($this->status !== 'all') {
            $query->whereIn('status', match ($this->status) {
                'to_ship' => ['processing', 'to_ship'],
                'to_receive' => ['shipped'],
                'completed' => ['delivered'],
                default => [$this->status],
            });
        }

        $this->orders = $query->get()->map(function ($order) {
            $user = $order->user;
            $address = $user->address;

            return [
                'id' => $order->id,
                'date' => $order->created_at->format('F j, Y, H:i'),
                'status' => match ($order->status) {
                    'processing' => 'to_ship',
                    'shipped' => 'to_receive',
                    'delivered' => 'completed',
                    default => $order->status,
                },
                'items' => $order->items->map(function ($item) {
                    $product = $item->product;
                    $variant = $item->variant;

                    // Default to the first product image if available, otherwise use a default image
                    $image = !empty($product->images) ? $product->images[0] : 'default-image.jpg';

                    // If a variant exists and has an image, use it instead
                    if ($variant && !empty($variant->image)) {
                        $image = $variant->image;
                    }

                    return [
                        'name' => $product->product_name,
                        'variant_name' => $variant ? $variant->name : 'N/A',
                        'qty' => $item->quantity,
                        'price' => $item->unit_amount,
                        'total' => $item->total_amount,
                        'image' => $image, // Uses the selected image logic
                    ];
                })->toArray(),
                'total_price' => $order->grand_total,
                'payment_method' => $order->payment_method,
                'payment_status' => $order->payment_status,
                'shipping_amount' => $order->shipping_amount,
                'user' => [
                    'first_name' => $user->address->first_name,
                    'last_name' => $user->address->last_name,
                    'phone' => $user->address->phone,
                    'address' => [
                        'street_address' => $address->street_address,
                        'city' => $address->city,
                        'province' => $address->province,
                        'zip_code' => $address->zip_code,
                    ],
                ],
                'message' => $this->getStatusMessage($order->status),
            ];
        })->toArray();
    }

    public function filterOrders($status)
    {
        $this->status = $status;
        $this->fetchOrders(); // Refresh orders based on new filter
    }

    public function selectOrder($orderId)
    {
        $this->selectedOrderId = $orderId;
        // dd($this->selectedOrderId);
    }


    public function getFilteredOrders()
    {
        if ($this->status === 'all') {
            return $this->orders;
        }
    
        return array_filter($this->orders, function ($order) {
            if ($this->status === 'to_ship') {
                return in_array($order['status'], ['to_ship', 'processing']);
            }
            if ($this->status === 'to_receive') {
                return in_array($order['status'], ['to_receive', 'shipped']);
            }
            if ($this->status === 'completed') {
                return in_array($order['status'], ['completed', 'delivered']);
            }
            return $order['status'] === $this->status;
        });
    }
    
    
    public function getStatusMessage($status)
    {
        return match ($status) {
            'new' => 'Your order is being processed.',
            'processing', 'to_ship' => 'Your order is being prepared for shipping.',
            'to_receive', 'shipped' => 'Your order is on its way to you.',
            'completed', 'delivered' => 'Order completed successfully.',
            'cancelled' => 'Order canceled due to payment failure.',
            default => 'Order status unknown.',
        };
    }
    

    public function render()
    {
        if ($this->selectedOrderId) {
            $order = collect($this->orders)->firstWhere('id', $this->selectedOrderId);
            return view('livewire.order-details', ['order' => $order]);
        }       

        return view('livewire.orders', [
            'filteredOrders' => $this->getFilteredOrders(),
        ]);
    }
}
