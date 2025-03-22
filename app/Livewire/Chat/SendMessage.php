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

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $createdMessage->created_at;
        $this->selectedConversation->save();

        // Reset the input field
        $this->body = '';
        // Dispatch message event
        $this->dispatch('pushMessage', messageId: $createdMessage->id)->to('chat.chatbox');
        $this->dispatch('refresh')->to('chat.chat-list');


        // Refresh conversation list
        $this->dispatch('refresh')->to('chat.chat-list');

        

        
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}