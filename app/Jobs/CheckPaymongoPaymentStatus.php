<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Helpers\CartManagement;



class CheckPaymongoPaymentStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function handle()
{
    $secretKey = config('services.paymongo.secret_key');

    if (!$this->order->paymongo_reference) {
        return;
    }

    $response = Http::withHeaders([
        "Authorization" => "Basic " . base64_encode($secretKey . ":"),
        "Content-Type" => "application/json",
    ])->get("https://api.paymongo.com/v1/links/{$this->order->paymongo_reference}");

    $data = $response->json();

    if (!isset($data['data']['attributes']['status'])) {
        return;
    }

    if (empty($data['data']['attributes']['status'])) {
        Log::warning('PayMongo status not found for reference', ['order_id' => $this->order->id]);
        return;
    }
    
    $status = $data['data']['attributes']['status'];
    
    switch ($status) {
        case 'paid':
            Log::info("Order marked as PAID", ['order_id' => $this->order->id]);
            $this->order->fresh()->update(['payment_status' => 'paid']);
            break;
        case 'failed':
        case 'expired':
            Log::info("Order marked as FAILED", ['order_id' => $this->order->id]);
            $this->order->fresh()->update(['payment_status' => 'failed', 'status' => 'cancelled']);
            break;
        default:
            Log::info("Unhandled PayMongo status", ['status' => $status, 'order_id' => $this->order->id]);
    }
    
    
}

}
