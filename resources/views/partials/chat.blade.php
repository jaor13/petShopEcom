@auth
    <div id="chat-button-container" style="position: fixed; z-index: 100; bottom: 1.5%; right: 5%;">
        <button id="chat-button"
            style="background-color:rgb(0, 181, 236); color: white; border: none; padding: 10px 10px; border-radius: 5px; font-weight: bold; font-size: 1.2rem">
            <i class="fas fa-comments" style="font-size: 1.2em; margin-right: 8px;"></i> Message Us
        </button>
    </div>

    <div id="chat-window"
        style="display: none; position: fixed; bottom: 1%; z-index: 100; right: 3.5%; width: 330px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: 'Poppins';">
        <div
            style="background-color: rgb(4, 200, 235); padding: 1.5%; border-top-left-radius: 10px; border-top-right-radius: 10px; display: flex; justify-content: space-between; align-items: center; box-shadow: 1% rgba(0, 0, 0, 0.4);">
            <div style="display: flex; align-items: center;">
                <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Petshop Logo"
                    style="width: 45px; height: 45px; margin-left: 10%; margin-right: 10px;">
                <p
                    style="color: white; font-weight: bolder; font-size: 1em; margin: 0; white-space: nowrap; margin-left: 4%; margin-top: 3%; font-family: 'Poppins';">
                    Aricuz Petshop
                </p>
            </div>

            <button id="close-chat"
                style="background: none; color: white; border: none; font-size: 1.6em; margin-right: 5%;">×</button>
        </div>
        <div
            style=" padding: 25px; height: 300px; overflow-y: auto; font-size: 0.8em; text-align: center; font-weight: bold; color:rgb(75, 74, 74);">
            <p style="font-family: 'Poppins';">Welcome to Aricuz PetShop! Ready to find the best pet care essentials? Let us
                know how we can help.</p>
        </div>
        <div>
            {{-- Because she competes with no one, no one can compete with her. --}}

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
            



        </div>
    </div>

    <script>
        document.getElementById("chat-button").addEventListener("click", function () {
            document.getElementById("chat-window").style.display = "block";
        });

        document.getElementById("close-chat").addEventListener("click", function () {
            document.getElementById("chat-window").style.display = "none";
        });
    </script>

    @livewire('chat.send-message')
@endauth