<div>
  <!-- Main Content -->
  <main class="container my-2 flex-grow-1 bg-red">
    <section class="slider position-relative">

      <!-- <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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
      </div> -->

      <div id="carouselExampleInterval" class="carousel slide  " data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" aria-current="true"
            class="active" aria-label="Slide 1"
            style="width: 10px; height: 10px; border-radius: 50%; background-color: white; margin: 5px;"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"
            style="width: 10px; height: 10px; border-radius: 50%; background-color: white; margin: 5px;"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"
            style="width: 10px; height: 10px; border-radius: 50%; background-color: white; margin: 5px;"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="3" aria-label="Slide 4"
            style="width: 10px; height: 10px; border-radius: 50%; background-color: white; margin: 5px;"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="4" aria-label="Slide 5"
            style="width: 10px; height: 10px; border-radius: 50%; background-color: white; margin: 5px;"></button>

        </div>

        <div class="carousel-inner " style="border-radius: 20px;">
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
    </section>

    @auth
    <div id="chat-button-container" style="position: fixed; z-index: 100; bottom: 20px; right: 75px;">
      <button id="chat-button"
      style="background-color: #00DCE3; color: white; border: none; padding: 10px 10px; border-radius: 10px; font-weight: bold; font-size: 1.5rem">
      <i class="fas fa-comments" style="font-size: 1.5em; margin-right: 5px; "></i> Chat
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
    <!-- Categories -->

    <div class="container-fluid p-2 rounded-3" style="background-color: white; padding: 20px;">
      <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1
          style="font-weight: bold; color: rgb(83, 82, 82); margin-top: 1.3em; font-size: xx-large; margin:0.8em 1em 0.5em 1.1em; display: flex; align-items: center;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 8px;"></span>
          Categories
        </h1>
      </div>

      <!-- Category Boxes -->
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding: 0.6em 0 1.2em 0; justify-content: center;">
        <a href="{{ url('products?category=' . "Dog") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-dog"></i>
        </a>

        <a href="{{ url('products?category=' . "Cat") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-cat"></i>
        </a>

        <a href="{{ url('products?category=' . "Bird Products") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-dove"></i>
        </a>


        <a href="{{ url('products?category=' . "Fish Feeders") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-fish"></i>
        </a>

        <a href="{{ url('products?category=' . "Bearded Dragons") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-dragon"></i>
        </a>

        <a href="{{ url('products?category=' . "Dog Toy") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-bone"></i>
        </a>

        <a href="{{ url('products?category=' . "Pet Shampoo & Bath Essentials") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-bath"></i>
        </a>


        <a href="{{ url('products?category=' . "Pet Health & Wellness") }}" wire:navigate class="category-box">
          <i class="fa-solid fa-prescription-bottle"></i>
        </a>


        <a href="{{ url('products?category=' . "Pet Grooming") }}" wire:navigate class="category-box"> <i
            class="fa-solid fa-scissors"></i>
        </a>

      </div>
    </div>


    <div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
      <div style=" display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-weight: bold; color: rgb(83, 82, 82); font-size: xx-large; margin:1em 0em 0em 1.1em;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 2px;"></span>

          Latest Products
        </h1>
        <a href="{{ route('products', ['type' => 'latest']) }}"
          style="font-size: 1.2em; color:rgb(145, 143, 143); margin-top: 1.4em; margin-right: 1.7em; text-decoration: none;"
          wire:navigate>
          View All >
        </a>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.2em">
        @livewire('partials.product-grid', ['limit' => 5, 'type' => 'latest'])
      </div>
    </div>

    <div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
      <div style=" display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-weight: bold; color:rgb(83, 82, 82); font-size: xx-large; margin:1em 0em 0em 1.1em;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 2px;"></span>

          Best Seller
        </h1>
        <a href="{{ route('products', ['type' => 'best_sellers']) }}"
          style="font-size: 1.2em; color: rgb(145, 143, 143); margin-top: 1.4em; margin-right: 1.7em; text-decoration: none;"
          wire:navigate>
          View All >
        </a>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.2em">
        @livewire('partials.product-grid', ['limit' => 5, 'type' => 'best_sellers'])
      </div>
    </div>

    <div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
      <div style=" display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-weight: bold; color: rgb(83, 82, 82); font-size: xx-large; margin:1em 0em 0em 1.1em;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 8px;"></span>

          Hygiene and Supply
        </h1>
        <a href="{{ route('products', ['category' => 'Hygiene Supplies']) }}"
          style="font-size: 1.2em; color: rgb(145, 143, 143); margin-top: 1.4em; margin-right: 1.7em; text-decoration: none;"
          wire:navigate>
          View All >
        </a>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.2em">
        @livewire('partials.product-grid', ['limit' => 5, 'type' => 'best_sellers', 'category' => 'Hygiene Supplies'])
      </div>
    </div>


    <div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
      <div style=" display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-weight: bold; color: rgb(83, 82, 82); font-size: xx-large; margin:1em 0em 0em 1.1em;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 8px;"></span>

          Dry Dog Treats
        </h1>
        <a href="{{ route('products', ['category' => 'Dry Dog Treats']) }}"
          style="font-size: 1.2em; color: rgb(145, 143, 143); margin-top: 1.4em; margin-right: 1.7em; text-decoration: none;"
          wire:navigate>
          View All >
        </a>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.2em">
        @livewire('partials.product-grid', ['limit' => 5, 'type' => 'best_sellers', 'category' => 'Dry Dog Treats'])
      </div>
    </div>

    <div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
      <div style=" display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-weight: bold; color: rgb(83, 82, 82); font-size: xx-large; margin:1em 0em 0em 1.1em;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 8px;"></span>

          Dry Cat Treats
        </h1>
        <a href="{{ route('products', ['category' => 'Dry Cat Treats']) }}"
          style="font-size: 1.2em; color: rgb(145, 143, 143); margin-top: 1.4em; margin-right: 1.7em; text-decoration: none;"
          wire:navigate>
          View All >
        </a>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.2em">
        @livewire('partials.product-grid', ['limit' => 5, 'type' => 'best_sellers', 'category' => 'Dry Cat Treats'])
      </div>
    </div>

    <div class="container-fluid p-2 rounded-3 mt-5" style="background-color: white;">
      <div style=" display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-weight: bold; color: rgb(83, 82, 82); font-size: xx-large; margin:1em 0em 0em 1.1em;">
          <span
            style="display: inline-block; width: 13px; height: 23px; background-color: #00D4FF; border-radius: 3px; margin-right: 8px;"></span>

          Pet Supplies
        </h1>
        <a href="{{ route('products', ['category' => 'Pet Supplies']) }}"
          style="font-size: 1.2em; color: rgb(145, 143, 143); margin-top: 1.4em; margin-right: 1.7em; text-decoration: none;"
          wire:navigate>
          View All >
        </a>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.2em">
        @livewire('partials.product-grid', ['limit' => 5, 'type' => 'best_sellers', 'category' => 'Pet Supplies'])
      </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


  </div>