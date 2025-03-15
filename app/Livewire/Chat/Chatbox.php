<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chatbox extends Component
{

    public $selectedConversation;
    public $receiver;
    public $receiverInstance;


    public $messages;
    public $paginateVar = 10;
    protected $listeners = ['loadConversation', 'updateSendMessage'];


    public function loadConversation(Conversation $conversation, User $receiver)
    {
        // Assign the received model instances directly
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
    
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->messages_count - $this->paginateVar)
            ->take($this->paginateVar)->get();

            $this->dispatch('chatSelected')->self();

    }
    
    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
