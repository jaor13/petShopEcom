<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'product_name', 'slug', 'images', 'description', 'price', 'is_active', 'in_stock', 'has_variant'];

    protected $casts = [
        'images' => 'array',
        'has_variant' => 'boolean',
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

    public function getStockAttribute()
    {
        if ($this->has_variant) {
            return $this->variants->sum('stock');
        }
        return $this->stocks->sum('stock_quantity');
    }

    public function getPriceAttribute()
    {
        if ($this->has_variant) {
            return $this->variants->min('price') ?? $this->attributes['price'];
        }
        return $this->attributes['price'];
    }

    public function updateStockAndAvailability()
    {
        $totalStock = $this->getStockAttribute();
        $this->in_stock = $totalStock > 0;
    }
    
    protected static function boot()
    {
        parent::boot();
    
        static::saving(function (Product $product) {
            if ($product->isDirty('has_variant')) { 
                $product->updateStockAndAvailability();
            }
        });
    }
    
}
