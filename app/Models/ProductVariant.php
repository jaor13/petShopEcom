<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'stock_quantity',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

  
    protected static function boot()
    {
        parent::boot();
    
        // Update price before saving the variant
        static::saving(function (ProductVariant $variant) {
            $variant->product->updatePrice();
        });
    
       
        // When deleting, update price and remove stock records
        static::deleting(function (ProductVariant $variant) {
            logger()->info('Deleting variant stock', [
                'variant_id' => $variant->id,
                'product_id' => $variant->product_id
            ]);
    
            $variant->product->updatePrice();
        });
    
        // After deletion, handle stock cleanup
        static::deleted(function (ProductVariant $variant) {

            // If no more variants exist, update product stock
            if ($variant->product->variants()->count() === 0) {
                $variant->product->updateStockAndAvailability();
            }
        });
    }
    

}


