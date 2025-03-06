<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'slug', 'images', 'description', 'price', 'is_active', 'in_stock', 'has_variant', 'stock_quantity','sold_count'];

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

   
    
    public function getPriceAttribute()
    {
        // already in sql trigger
        // function will return the mninimum price of product e.g sa product table if walang variant then price column will be the base price
        // but if may variant naman siya hahanapin niya yung lowest price sa variant table then yun magga update yung base price sa product table sa lowest price
        // based sa variant price
       
        if ($this->has_variant && $this->variants()->exists()) {
            return $this->variants()->min('price');
        }

        return $this->attributes['price'] ?? 0;
    }

    public function getStockAttribute()
    {
        // already in sql trigger
        //calculate the  sum of stock_quantity of dif varaints of a product 
        //used by the updateStockAndAvailability function in comparing if the product/variant has a stock
        if ($this->has_variant) {
            return $this->variants()->sum('stock_quantity') ?? 0; 
        }

        return $this->attributes['stock_quantity'] ?? 0; 
    }

    public function updateStockAndAvailability()
    {
        // already in sql trigger
        // function update the in_stock column in product table
        // if 1 meaning there is a record of a product/variant in stock table
        // if 0 meaning there is no record of a product/variant in stock table

        // $totalStock = $this->getStockAttribute();
        $totalStock = $this->has_variant ? $this->variants()->sum('stock_quantity') : $this->stock_quantity;


        $this->stock_quantity = $totalStock;
        $this->in_stock = $totalStock > 0;
        $this->saveQuietly();  // Prevents the 'saved' event from being triggered
   
    }
    public function updatePrice()
    {
        // already in sql trigger
        //update price column in product table
        if ($this->has_variant && $this->variants()->exists()) {
            $this->price = $this->variants()->min('price');
            $this->saveQuietly();  // Prevents the 'saved' event from being triggered
        }
    }


    public function setStockQuantityAttribute($value)
    {
        //updates or create stock quantity in product table
        $this->attributes['stock_quantity'] = $value;
    }
    

    protected static function boot()
    {
        parent::boot();

        // already in sql trigger
        static::saved(function (Product $product) {
            // Update stock availability after saving
            $product->updateStockAndAvailability();
            $product->updatePrice();

        });

        static::deleted(function (Product $product) {
            // Delete all variants when a product is deleted
            $product->variants()->delete();
        });


        // already in sql trigger
        ProductVariant::saved(function (ProductVariant $variant) {
            $variant->product->updateStockAndAvailability();
        });
    
        // already in sql trigger
        ProductVariant::deleted(function (ProductVariant $variant) {
            $variant->product->updateStockAndAvailability();
        });
    }



    //     //
    //     public function updateStockFromVariants()
    // {
    //     $this->update([
    //         'stock_quantity' => $this->variants()->sum('stock_quantity'),
    //     ]);
    // }





}