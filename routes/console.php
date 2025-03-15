<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Jobs\CheckPaymongoPaymentStatus;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $orders = Order::where('payment_status', 'processing')->get();
    foreach ($orders as $order) {
        CheckPaymongoPaymentStatus::dispatch($order);
    }
})->everyMinute();
