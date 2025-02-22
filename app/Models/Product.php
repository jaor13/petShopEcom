<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'slug', 'images', 'description', 'price', 'is_active', 'in_stock', 'has_variant'];

    protected $casts = [
        'images' => 'array',
        'has_variant' => 'boolean',
        'is_active' => 'boolean',
        'in_stock' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function singleStock()
    {
        return $this->hasOne(Stock::class, 'product_id');
    }
    
    public function getPriceAttribute()
    {
        // function will return the mninimum price of product e.g sa product table if walang variant then price column will be the base price
        // but if may variant naman siya hahanapin niya yung lowest price sa variant table then yun magga update yung base price sa product table sa lowest price
        // based sa variant price
       
        $basePrice = $this->attributes['price'] ?? 0;

        if ($this->has_variant && $this->variants()->exists()) {
            $minVariantPrice = $this->variants()->min('price');
            return $minVariantPrice < $basePrice ? $minVariantPrice : $basePrice;
        }

        return $basePrice;
    }

    public function getStockAttribute()
    {
        //calculate all stocks of a product/variant
        //used by the updateStockAndAvailability function in comparing if the product/variant has a stock
        return $this->has_variant 
            ? $this->variants()->with('stocks')->get()->sum(fn($variant) => $variant->stocks->sum('stock_quantity'))
            : optional($this->singleStock)->stock_quantity ?? 0;
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
    public function updatePrice()
    {
        //update price column in product table
        if ($this->has_variant && $this->variants()->exists()) {
            $this->update(['price' => $this->variants()->min('price')]);
        }
    }


    public function setStockQuantityAttribute($value)
    {
        if (!is_null($value)) {
            $this->stocks()->updateOrCreate(
                ['product_id' => $this->id], // Ensure it updates the correct stock record
                ['stock_quantity' => (int) $value] // Set the new stock quantity
            );
        }
    }
    

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Product $product) {
            // Update stock availability after saving
            $product->updateStockAndAvailability();

            // Handle stock updates only for non-variant products
            if (!$product->has_variant && $product->wasChanged('stock_quantity')) {
                $stockQuantity = request()->input('stock_quantity'); // null igtatao

                logger()->info('Updating stock for product', [
                    'product_id' => $product->id,
                    'stock_quantity' => $stockQuantity
                ]);

                Stock::updateOrCreate(
                    ['product_id' => $product->id],
                    ['stock_quantity' => $stockQuantity]
                );
            }
        });

        static::deleted(function (Product $product) {
            $product->variants()->delete();
            $product->singleStock()->delete();
        });
    }

}