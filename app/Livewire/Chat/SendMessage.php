<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class SendMessage extends Component
{
protected $listeners = ['updateSendMessage'];

public function updateSendMessage($conversation, $receiver)
{
    $this->selectedConversation = $conversation;
    $this->receiverInstance = $receiver;
}


    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
