<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'order_item_id', 'rating', 'comment', 'images'];

    protected $casts = [
        'images' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }
}
