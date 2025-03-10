<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message',
    ];

    //relationships

    public function messages()
{
    return $this->hasMany(Message::class, 'conversation_id')->orderBy('created_at', 'ASC');
}

public function latestMessage()
{
    return $this->hasOne(Message::class, 'conversation_id')->latest();
}



    public function user()
    {
        return $this->belongsTo(User::class);
        # code...
    }
}