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
    public $message = 'makakareview na aq T_T';

    public function checkconversation($receiver_id)
    {
        // Check if a conversation already exists
        $checkedConversation = Conversation::where(function ($query) use ($receiver_id) {
            $query->where('receiver_id', auth()->user()->id)
                  ->where('sender_id', $receiver_id);
        })->orWhere(function ($query) use ($receiver_id) {
            $query->where('receiver_id', $receiver_id)
                  ->where('sender_id', auth()->user()->id);
        })->first(); // Use first() instead of get()
    
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
        
            $createdConversation->update(['last_time_message' => $createdMessage->created_at]);
        
        
            dd('saved');
        } else {
            // Conversation exists - append a message instead
            Message::create([
                'conversation_id' => $checkedConversation->id, // Use conversation_id
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiver_id,
                'body' => $this->message,
            ]);
            
    
            $checkedConversation->update(['last_time_message' => Carbon::now()]);
    
            dd('conversation exists');
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
