<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceRecord extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_id()
    {
        return $this->belongsTo(Order::class);
    }
}
