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

    public function chatUserSelected(array $data)
{
    // Ensure $data contains the required keys
    if (!isset($data['conversation_id'], $data['receiver_id'])) {
        return;
    }

    // Fetch the conversation and receiver
    $this->selectedConversation = Conversation::find($data['conversation_id']);
    $receiverInstance = User::find($data['receiver_id']);

    // Dispatch events if both exist
    if ($this->selectedConversation && $receiverInstance) {
        $this->dispatch('loadConversation', [
            'conversation_id' => $this->selectedConversation->id,
            'receiver_id' => $receiverInstance->id
        ]);

        $this->dispatch('updateSendMessage', [
            'conversation_id' => $this->selectedConversation->id,
            'receiver_id' => $receiverInstance->id
        ]);
    }
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
        $this->conversations = Conversation::with(['latestMessage', 'messages'])
            ->where(function ($query) {
                $query->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->orderBy('last_time_message', 'DESC')
            ->get();
    }


    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
