<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Helpers\CartManagement;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success(Request $request) {
        $orderId = $request->query('order'); // Retrieve order ID from the query string
        $order = Order::find($orderId);

        if (!$order) {
            session()->flash('error', 'Order not found.');
            return redirect()->route('checkout'); // Redirect to checkout in case of error
        }

        // Update Order Payment Status
        $order->update([
            'payment_status' => 'paid',
            'status' => 'confirmed', // Set order status to confirmed
        ]);

        // Clear the user's cart
        CartManagement::clearCartItems();

        // Redirect to My Purchases
        session()->flash('success', 'Payment successful! Your order has been placed.');
        return redirect()->route('my-purchases');
    }

    public function failed(Request $request) {
        $orderId = $request->query('order');
        $order = Order::find($orderId);

        if ($order) {
            $order->update([
                'payment_status' => 'failed',
                'status' => 'cancelled',
            ]);
        }

        session()->flash('error', 'Payment failed. Please try again.');
        return redirect()->route('checkout');
    }
}
