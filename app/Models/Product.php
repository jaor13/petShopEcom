<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'product_name', 'slug', 'images', 'description', 'price','is_active' ,'in_stock'];

    protected $casts = [
        'images' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
      

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
