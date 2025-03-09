<div>
    {{-- Do your work, then step back. --}}

    <div class="chatlist_header">

        <div class="title">
            Messages

        </div>

        <div class="img_container">
            <img src="https://picsum.photos/id/237/200/300" alt="dogo">
        </div>
    </div>

    <div class="chatlist_body">

        @if(count($conversations) > 0)

            @foreach ($conversations->unique('receiver_id') as $conversation)

                <div class="chatlist_item">

                    <div class="chatlist_img_container">
                        <img src="https://picsum.photos/id/{{ $this->getChatUserInstance($conversation, $username = 'id') }}/200/300"
                            alt="dogo">
                    </div>

                    <div class="chatlist_info">
                        <div class="top_row">
                            <div class="list_username"> {{ $this->getChatUserInstance($conversation, $username = 'username') }}
                            </div>
                            <span class="date">{{ $conversation->messages->last()?->created_at }}</span>
                        </div>

                        <div class="bottom_row">

                            <div class="message_body text-truncate">
                                {{ $conversation->latestMessage->body ?? 'No messages yet' }}
                            </div>


                            <div class="unread_count">
                                56
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            you have no conversations

        @endif

    </div>

</div>