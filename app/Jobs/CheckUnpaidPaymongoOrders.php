<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CheckUnpaidPaymongoOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Get current time minus 20 minutes
        $cutoffTime = Carbon::now()->subMinutes(20);

        // Retrieve unpaid PayMongo orders older than 20 minutes
        $orders = Order::where('payment_method', 'paymongo')
            ->where('payment_status', 'unpaid || processing') //unpaid lang uni initially
            ->where('created_at', '<=', $cutoffTime)
            ->get();

        foreach ($orders as $order) {
            // Update the payment status and order status
            $order->update([
                'payment_status' => 'failed',
                'status' => 'cancelled',
            ]);

            // Log the updates for debugging
            Log::info("Order #{$order->id} marked as failed and cancelled (PayMongo unpaid for over 20 minutes).");
        }
    }
}
