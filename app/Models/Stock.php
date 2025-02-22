<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'variant_id', 'stock_quantity'];

    protected $casts = [
        'stock_quantity' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class)->whereNotNull('variant_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function (Stock $stock) {
            // Prevent deletion when updating stock for single products
            if (!$stock->product->has_variant) {
                // Only delete stock if it's an actual removal (not an update)
                if ($stock->isDirty('stock_quantity') && $stock->stock_quantity === 0) {
                    Stock::where('product_id', $stock->product_id)->delete();
                }
            }
        });

        static::saved(function (Stock $stock) {
            if ($stock->product) {
                $stock->product->updateStockAndAvailability();
                $stock->product->saveQuietly();
            } elseif ($stock->variant) {
                $stock->variant->product->updateStockAndAvailability();
                $stock->variant->product->saveQuietly();
            }
        });
    }

}
