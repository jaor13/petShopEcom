@auth
    <div id="chat-button-container" style="position: fixed; z-index: 100; bottom: 20px; right: 175px;">
        <button id="chat-button"
            style="background-color: #00D1D8; color: white; border: none; padding: 10px 10px; border-radius: 10px; font-weight: bold; font-size: 1.5rem">
            <i class="fas fa-comments" style="font-size: 1.5em; margin-right: 5px;"></i> Chat
        </button>
    </div>

    <div id="chat-window"
        style="display: none; position: fixed; bottom: 10px; z-index: 100; right: 100px; width: 350px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div
            style="background-color:#00DCE3; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Petshop Logo"
                    style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px; align-items:center;">
                Aricuz Petshop
            </div>
            <button id="close-chat" style="background: none; border: none; font-size: 1.2em;">×</button>
        </div>
        <div style="padding: 15px; height: 300px; overflow-y: auto;">
            <p>Welcome to Pet Haven! Ready to find the best pet care essentials? Let us know how we can help.</p>
        </div>
        <div style="padding: 10px; border-top: 1px solid #ddd; display: flex; align-items: center;">
            <button style="background: none; border: none; font-size: 1.5em;">
                <i class="fas fa-image"></i> </button>
            <input type="text" placeholder="Type a message"
                style="flex: 1; padding: 8px; border: 1px solid #ddd; border-radius: 5px; margin: 0 10px;">
            <button style="background: none; border: none; font-size: 1.5em; color: #00DCE3;">
                <i class="fas fa-paper-plane"></i> </button>
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