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
        'image',
        'stock_quantity',
        'sold_count',
        'image', 
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    
  
    protected static function boot()
    {
        parent::boot();
    
        // already in sql trigger
        // update price kang base price sa products table based sa lowest price sa variants table
        // function is nasa product model igcall lang
        static::saving(function (ProductVariant $variant) {
            $variant->product->updatePrice();
        });

        // // Update stock after saving the variant added

        // static::updated(function ($variant) {
        //     $variant->product->updateStockFromVariants();
        // });
    
        // static::deleted(function ($variant) {
        //     $variant->product->updateStockFromVariants();
        // });
    
       
        // already in sql trigger
        // pag nagdelete ki variant it must update price based sa pinakamababang price sa variant table if may variant pang  iba
        static::deleting(function (ProductVariant $variant) {
            $variant->product->updatePrice();
        });
    
        //already in sql trigger
        // After deletion, handle stock cleanup
        static::deleted(function (ProductVariant $variant) {

        // if wala nang stock yung product/variant then update yung in_stock column sa product table
            if ($variant->product->variants()->count() === 0) {
                $variant->product->updateStockAndAvailability();
            }
        });
    }
    

}


