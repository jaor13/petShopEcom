<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    @if ($selectedConversation)
        <form wire:submit.prevent="sendMessage" class="chat-form">
            <div class="chatbox_footer">
                <div class="custom_form_group">
                    <button type="button" class="image-button">
                        <i class="fas fa-image"></i>
                    </button>
                    <input wire:model="body" type="text" class="control"  placeholder="Write message">
                    <button type="submit" class="submit">Send</button>
                </div>
            </div>
        </form>

    @endif
</div>