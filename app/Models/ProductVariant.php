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


    public function setStockQuantityAttribute($value)
    { 
        //updates or create stock quantity in stockc table
        if (!is_null($value)) {
            $this->stocks()->updateOrCreate(
                ['variant_id' => $this->id, 'product_id' => $this->product_id],
                ['stock_quantity' => (int) $value]
            );
        }
    }

    public function getStockAttribute()
    {
        //returns the total stock quantity of the variant
        return $this->stocks->sum('stock_quantity'); 
    }

    public function updateStockAndAvailability()
    {
        // function update the in_stock column in product table
        // if 1 meaning there is a record of a product/variant in stock table
        // if 0 meaning there is no record of a product/variant in stock table
        $totalStock = $this->getStockAttribute();
        $this->in_stock = $totalStock > 0;
        $this->saveQuietly(); // Prevents triggering infinite loop
    }

    

    protected static function boot()
    {
        parent::boot();
    
        // Update price before saving the variant
        static::saving(function (ProductVariant $variant) {
            $variant->product->updatePrice();
        });
    
        // After saving, handle stock updates and logging
        static::saved(function (ProductVariant $variant) {
            if ($variant->wasChanged('stock_quantity')) {
                $stockQuantity = request()->input('stock_quantity'); // Get input value
    
                logger()->info('Updating stock for variant', [
                    'variant_id' => $variant->id,
                    'product_id' => $variant->product_id,
                    'stock_quantity' => $stockQuantity
                ]);
    
                Stock::updateOrCreate(
                    ['product_id' => $variant->product_id, 'variant_id' => $variant->id],
                    ['stock_quantity' => $stockQuantity]
                );
    
                // Update parent product stock & availability
                $variant->product->updateStockAndAvailability();
            }
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
            $variant->stocks()->delete();
    
            // If no more variants exist, update product stock
            if ($variant->product->variants()->count() === 0) {
                $variant->product->updateStockAndAvailability();
            }
        });
    }
    








}


