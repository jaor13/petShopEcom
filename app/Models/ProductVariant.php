<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Bus;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'stock_quantity'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'variant_id');
    }

    public function getStockAttribute()
    {
        return $this->stocks()->sum('stock_quantity');
    }

    public function setStockQuantityAttribute($value)
    {
        if (!is_null($value)) {
            $stock = $this->stocks()->updateOrCreate(
                ['variant_id' => $this->id],
                [
                    'product_id' => $this->product_id,
                    'stock_quantity' => (int) $value
                ]
            );
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function (ProductVariant $variant) {
            if ($variant->wasChanged('stock_quantity')) { // Update only if stock changed
                if ($variant->product) {
                    $variant->product->updateStockAndAvailability();
                }
            }
        });

        static::deleted(function (ProductVariant $variant) {
            if ($variant->product->variants()->count() === 0) {
                // Only delete stock if no more variants exist
                $variant->stocks()->delete();
            }

            $variant->product->updateStockAndAvailability();
        });
}

}