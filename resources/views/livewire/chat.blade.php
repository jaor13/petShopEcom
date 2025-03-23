<form wire:submit.prevent="sendMessage">
    <div class="chatbox_footer">
        <div class="custom_form_group">
            <input wire:model.defer="body" placeholder="Write message" type="text" class="control">
            <button type="submit" class="submit">Send</button>
        </div>
    </div>
</form>
