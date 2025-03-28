<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FilaChatMessage;
use App\Models\User;
use JaOcero\FilaChat\Models\Thread;
use Illuminate\Support\Facades\Auth;

class UserChat extends Component
{
    public $threadId;
    public $message;
    public $messages = [];

    public function mount($threadId)
    {
        $this->threadId = $threadId;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = :where('thread_id', $this->threadId)
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'thread_id' => $this->threadId,
            'sender_id' => Auth::id(),
            'content' => $this->message,
        ]);

        $this->message = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.user-chat');
    }
}