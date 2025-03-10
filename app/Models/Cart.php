<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'name',
        'slug',
        'variant_name',
        'image',
        'quantity',
        'unit_amount',
        'total_amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
