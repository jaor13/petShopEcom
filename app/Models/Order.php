<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',  
        'notes',
        'paymongo_reference',
        'delivered_at', 
        'completed_at', 
        'cancelled_at',
        'shipped_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    // public function address(){
    //     return $this->hasOne(Address::class);
    // }




    // added 3/1/2025 

    public function updateProductSales()
    {
        $previousStatus = $this->getOriginal('status'); // Get the previous status
    
        if ($previousStatus === 'delivered' && $this->status !== 'delivered') {
            // If order was delivered but is now pending/canceled, revert the sold count
            foreach ($this->items as $item) {
                if ($item->variant_id) {
                    $variant = $item->variant;
                    $variant->decrement('sold_count', $item->quantity);
                    
                    $product = $variant->product;
                    $product->decrement('sold_count', $item->quantity);
                } else {
                    $product = $item->product;
                    $product->decrement('sold_count', $item->quantity);
                }
            }
        } elseif ($previousStatus !== 'delivered' && $this->status === 'delivered') {
            // If order was NOT delivered before but is now delivered, increment the sold count
            foreach ($this->items as $item) {
                if ($item->variant_id) {
                    $variant = $item->variant;
                    $variant->increment('sold_count', $item->quantity);
                    
                    $product = $variant->product;
                    $product->increment('sold_count', $item->quantity);
                } else {
                    $product = $item->product;
                    $product->increment('sold_count', $item->quantity);
                }
            }
        }
    }
    
    // Automatically update sales when order status changes
    protected static function boot()
    {
        parent::boot();
        static::updated(function ($order) {
            $order->updateProductSales();
        });
    }
    





}