<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{
    public $auth_id;
    public $conversations;
    public $receiverInstance;
    public $username;

    public $selectedConversation;

    protected $listeners = ['chatUserSelected'];

    public function chatUserSelected(int $conversation_id, int $receiver_id)
{
    // Fetch the conversation and receiver
    $this->selectedConversation = Conversation::findOrFail($conversation_id);
    $receiverInstance = User::findOrFail($receiver_id);

    // Emit to specific Livewire components
    $this->dispatch('loadConversation', $this->selectedConversation, $receiverInstance)
         ->to('chat.chatbox');

    $this->dispatch('updateSendMessage', $this->selectedConversation, $receiverInstance)
         ->to('chat.send-message');
}


    public function getChatUserInstance(Conversation $conversation, $request)
    {
        $this->auth_id = auth()->id();
        $this->receiverInstance = User::firstWhere(
            'id',
            $conversation->sender_id == $this->auth_id
            ? $conversation->receiver_id
            : $conversation->sender_id
        );


        return optional($this->receiverInstance)->{$request} ?? 'Unknown';

    }

    

    public function mount()
    {
        $this->auth_id = auth()->id();
    
        $this->conversations = Conversation::with([
                'latestMessage' => function ($query) {
                    $query->latest(); // Get the most recent message
                }, 
                'messages'
            ])
            ->where(function ($query) {
                $query->where('sender_id', $this->auth_id)
                      ->orWhere('receiver_id', $this->auth_id);
            })
            ->orderByRaw('(SELECT MAX(created_at) FROM messages WHERE messages.conversation_id = conversations.id) DESC')
            ->get();
    }
    

 
    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
