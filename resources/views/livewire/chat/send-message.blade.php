<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    @if (isset($isNewConversation) && $isNewConversation)
        <form wire:submit.prevent="sendMessage" class="chat-form">
            <div class="chatbox_footer">
                <div class="custom_form_group">
                    <button type="button" class="image-button">
                        <i class="fas fa-image"></i>
                    </button>
                    <input wire:model.defer="body" placeholder="Write message" type="text" class="control">
                    <button type="submit" class="submit">Send</button>
                </div>
            </div>
        </form>


    @endif
</div>