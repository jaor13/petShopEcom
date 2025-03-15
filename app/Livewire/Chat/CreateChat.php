<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $message = '$data...';

    public function checkconversation($receiver_id)
{
    $checkedConversation = Conversation::where(function ($query) use ($receiver_id) {
        $query->where('receiver_id', auth()->user()->id)
              ->where('sender_id', $receiver_id);
    })->orWhere(function ($query) use ($receiver_id) {
        $query->where('receiver_id', $receiver_id)
              ->where('sender_id', auth()->user()->id);
    })->first();

    if (!$checkedConversation) {
        $createdConversation = Conversation::create([
            'receiver_id' => $receiver_id,
            'sender_id' => auth()->user()->id,
            'last_time_message' => Carbon::now()
        ]);
    
        $createdMessage = Message::create([
            'conversation_id' => $createdConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver_id,
            'body' => $this->message,
        ]);

        // Structured Debug Output
        dump($createdMessage); // Dump the structured output before stopping execution
        dd($createdMessage->toArray());

    } else {
        $newMessage = Message::create([
            'conversation_id' => $checkedConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver_id,
            'body' => $this->message,
        ]);

        // Structured Debug Output
        dump($newMessage);
        dd($newMessage->toArray());
    }
}


    public function render()
    {
        if (auth()->check()) {
            $this->users = User::where('id', '!=', auth()->user()->id)->get();
        } else {
            $this->users = collect(); // Return an empty collection if user is not authenticated
        }
        return view('livewire.chat.create-chat');
    }
}
