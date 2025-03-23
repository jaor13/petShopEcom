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

    public $isNewConversation = false;

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

        $admin = User::where('role', 'admin')->first();

        if ($admin) {
            Message::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $admin->id,
                'body' => $this->body,
            ]);
        }

        // Reset input field
        $this->body = '';
        $this->isNewConversation = false; // ✅ Once a message is sent, it's no longer a new conversation
    }

    public function mount()
    {
        $admin = User::where('role', 'admin')->first();

        if ($admin) {
            $messages = Message::where(function ($query) use ($admin) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $admin->id);
            })->orWhere(function ($query) use ($admin) {
                $query->where('sender_id', $admin->id)
                    ->where('receiver_id', auth()->id());
            })->exists();

            $this->isNewConversation = !$messages;
        }
    }

    public function getIsNewConversationProperty()
{
    return $this->isNewConversation;
}



    public function render()
    {
        return view('livewire.chat.send-message', [
            'isNewConversation' => $this->isNewConversation, // ✅ Pass to Blade
        ]);
    }
}