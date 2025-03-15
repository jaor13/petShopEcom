<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message; // Ensure Message model is imported
use App\Models\User;
use Livewire\Component;

class SendMessage extends Component
{
    public $receiverInstance;
    public $selectedConversation;
    public $body;

    protected $listeners = ['loadConversation', 'updateSendMessage'];


    public function updateSendMessage(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        if ($this->body == null) {
            return;
        }

        // Fixed incorrect variable reference ($this->$selectedConversation -> should be $this->selectedConversation)
        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message= $createdMessage->created_at;
        $this->selectedConversation->save();
        // Clear message input field after sending
     
        
        $this->dispatch('pushMessage', messageId: $createdMessage->id)
        ->to('chat.chatbox');   
        
       // Refresh conversation list
$this->dispatch('refresh')->to('chat.chat-list'); 
$this->reset('body');

// Dispatch event to self
$this->dispatch('dispatchMessageSent');


    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
