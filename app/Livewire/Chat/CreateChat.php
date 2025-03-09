<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CreateChat extends Component {
    public $users;

    public function checkconversation($receiver_id){
        dd($receiver_id);
    }

    public function render() {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.chat.create-chat');
    }

}
