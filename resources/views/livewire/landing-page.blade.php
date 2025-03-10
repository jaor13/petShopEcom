<div>
  <!-- Main Content -->
  <main class="container my-2 flex-grow-1 bg-red">
    <section class="slider position-relative">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('assets/images/Slide1.svg') }}" class="d-block w-100" alt="Slide 1">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/Slide2.svg') }}" class="d-block w-100" alt="Slide 2">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/Slide3.svg') }}" class="d-block w-100" alt="Slide 3">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/Slide4.svg') }}" class="d-block w-100" alt="Slide 4">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/Slide5.svg') }}" class="d-block w-100" alt="Slide 5">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- Intro Section (Overlay on Top of Carousel) -->
      @auth
      <div class="intro">
      <h1 class="pawsome-essentials">Pawsome Essentials<br>Delivered with Love!</h1>
      <p class="lorem-ipsum">Lorem ipsum dolor sit amet consectetur. Integer ut sed praesent eget auctor donec
        egestas orci amet.</p>

      </div>
    @endauth

      @guest
      <div class="intro">
      <h1 class="pawsome-essentials">Pawsome Essentials<br>Delivered with Love!</h1>
      <p class="lorem-ipsum">Lorem ipsum dolor sit amet consectetur. Integer ut sed praesent eget auctor donec
        egestas orci amet.</p>
      <button class="shop-now">Shop Now</button>
      </div>
    @endguest
    </section>

    @auth
    <div id="chat-button-container" style="position: fixed; bottom: 20px; right: 175px;">
      <button id="chat-button"
      style="background-color: #00D1D8; color: white; border: none; padding: 10px 10px; border-radius: 10px; font-weight: bold; font-size: 1.5rem">
      <i class="fas fa-comments" style="font-size: 1.5em; margin-right: 5px; "></i> Chat
      </button>
    </div>

    <div id="chat-window"
      style="display: none; position: fixed; bottom: 10px; right: 100px; width: 350px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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
  @endauth
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const chatButton = document.getElementById('chat-button');
      const chatWindow = document.getElementById('chat-window');
      const closeChatButton = document.getElementById('close-chat');

      chatButton.addEventListener('click', function () {
        chatWindow.style.display = 'block';
        chatButton.style.display = 'none'; // Hide the chat button
      });

      closeChatButton.addEventListener('click', function () {
        chatWindow.style.display = 'none';
        chatButton.style.display = 'block'; // Show the chat button
      });
    });
  </script>

<div class="container p-3">
    <!-- New Products Section -->
    <div class="container-fluid p-2 rounded-3" style="background-color: white;">
  <div style=" display: flex; justify-content: space-between; align-items: center;">
    <h1 style="font-weight: bold; color: gray; font-size: xx-large; margin:0.4em 0em 0em 1em;">
      New Released Products
    </h1>
    <a href="{{ route('products', ['type' => 'latest']) }}" style="font-size: 1.2em; color: gray; margin-right: 1.7em; text-decoration: none;">
      View All
    </a>
  </div>
  <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
    @livewire('partials.product-grid', ['limit' => 5, 'type' => 'latest'])
  </div>
</div>



<div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
  <div style=" display: flex; justify-content: space-between; align-items: center;">
    <h1 style="font-weight: bold; color: gray; font-size: xx-large; margin:0.4em 0em 0em 1em;">
     Best Seller Products
    </h1>
    <a href="{{ route('products', ['type' => 'best_sellers']) }}" style="font-size: 1.2em; color: gray; margin-right: 1.7em; text-decoration: none;">
      View All
    </a>
  </div>
  <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
    @livewire('partials.product-grid', ['limit' => 5, 'type' => 'best_sellers'])
  </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</div>