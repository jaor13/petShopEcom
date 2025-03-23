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
    public $isNewConversation = false;

    public $messages;
    public $paginateVar = 10;
    protected $listeners = [
        'loadConversation',
        'updateSendMessage',
        'pushMessage',
        'messageSent' => 'loadMessages', // Listen for new messages
        'refreshMessages' => 'render'
    ];


    public function pushMessage($id)
    {
        $newMessage = Message::find($id);

        if ($newMessage instanceof Message) {  // Ensure it's a single message instance
            if (!$this->messages instanceof \Illuminate\Support\Collection) {
                $this->messages = collect($this->messages);
            }

            $this->messages->push($newMessage);
        }
    }




    public function loadMessages()
    {
        $admin_id = User::where('role', 'admin')->value('id');

        $this->messages = Message::where(function ($query) use ($admin_id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $admin_id);
        })->orWhere(function ($query) use ($admin_id) {
            $query->where('sender_id', $admin_id)
                ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        // Check if there are no messages, meaning it's a new conversation
        $this->isNewConversation = $this->messages->isEmpty();
    }
    public function render()
    {
        return view('livewire.chat.Chatbox');
    }
}
