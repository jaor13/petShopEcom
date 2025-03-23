<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SendMessage extends Component
{
    public $receiverInstance;
    public $selectedConversation;
    public $body;

    protected $listeners = ['loadConversation', 'updateSendMessage', 'pushMessage'];

    public function updateSendMessage(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        if (empty($this->body)) {
            return;
        }
    
        // Create the message
        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id, // Admin's ID
            'body' => $this->body,
        ]);
    
        // Update the last message timestamp
        $this->selectedConversation->last_time_message = now();
        $this->selectedConversation->save();
    
        // Reset the input field after sending
        $this->body = '';
    
        // Emit event to update the chatbox component
        $this->dispatch('messageSent')->to('chat.chatbox');
    }
    

public function mount()
{
    $user = auth()->user();
    
    if ($user->role === 'admin') {
        // Admin side: conversation will be set through updateSendMessage method
        return;
    } else {
        // User side: automatically set up conversation with admin
        $admin = User::where('role', 'admin')->first();
        
        if ($admin) {
            $this->receiverInstance = $admin;
            $this->selectedConversation = Conversation::firstOrCreate([
                'sender_id' => auth()->id(),
                'receiver_id' => $admin->id,
            ], [
                'last_time_message' => now(),
            ]);
        } else {
            session()->flash('error', 'Admin user not found.');
        }
    }
}
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}