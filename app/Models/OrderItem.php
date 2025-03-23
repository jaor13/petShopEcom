<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'variant_id', 
        'quantity',
        'unit_amount',
        'total_amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'order_item_id');
    }

      // Update stock quantity when creating an order item
      protected static function boot()
      {
          parent::boot();
  
          static::creating(function ($orderItem) {
              $orderItem->updateStock(-$orderItem->quantity); // Reduce stock
          });
  
          static::deleting(function ($orderItem) {
              $orderItem->updateStock($orderItem->quantity); // Restore stock if order is canceled
          });
      }
  
      private function updateStock($amount)
      {
          if ($this->variant_id) {
              // Deduct from product variant
              $variant = $this->variant;
              if ($variant) {
                  $variant->decrement('stock_quantity', abs($amount));
              }
          } else {
              // Deduct from product directly (only if no variant)
              $product = $this->product;
              if ($product && !$product->variants()->exists()) {
                  $product->decrement('stock_quantity', abs($amount));
              }
          }
      }


    
}
