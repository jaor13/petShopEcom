
<div>
    <div style="height: 300px; overflow-y: auto;">
        @foreach ($messages as $msg)
            <div class="{{ $msg->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                <strong>{{ $msg->sender->name }}:</strong> {{ $msg->message }}
            </div>
        @endforeach
    </div>

    <input type="text" wire:model="message" placeholder="Type a message..." />
    <button wire:click="sendMessage">Send</button>
</div>


