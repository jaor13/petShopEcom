<!-- Header -->
<header class="container-fluid header-container border-bottom">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Brand Logo -->
        <a class="d-flex align-items-center" href="{{ url('/') }}" wire:navigate>
            <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Brand Logo" class="img-fluid brand-logo">
        </a>

        <!-- Search Bar with Categories -->
        <div class="d-none d-md-flex flex-grow-1 align-items-center search-container">
            <form id="search-form" class="d-flex align-items-center w-100" action="{{ url('products') }}" method="GET">
                <!-- Search Input -->
                <input type="text" name="query" class="form-control search-input" placeholder="Search in Aricuz"
                    value="{{ request('query') }}">

                <!-- Keep category when searching -->
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <!-- Category Dropdown -->
                <div class="dropdown category-dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle category-btn" type="button"
                        data-bs-toggle="dropdown">
                        {{ request('category', 'All Categories') }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('products') }}">All Categories</a></li>
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ url('products?category=' . $category->name) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>



                <!-- Search Button -->
                <button type="submit" class="btn btn-primary search-btn">
                    <iconify-icon icon="tabler:search"></iconify-icon>
                </button>
            </form>
        </div>


        <!-- Cart Icon -->
        @auth
            <div class="cart-container">
                <a href="{{ url('cart/') }}" wire:navigate class="relative flex items-center space-x-1">
                    <span><iconify-icon icon="mdi:cart" class="iconify-cart"></iconify-icon></span>
                    <span
                        class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-blue-50 border border-blue-200 text-blue-600">{{ $total_count }}</span>
                </a>
            </div>
            <!-- User Profile Icon with Dropdown (Alpine.js) -->
            <div class="relative" x-data="{ open: false }">
                <!-- User Icon Button -->
                <button @click="open = !open" @click.away="open = false"
                    class="flex items-center space-x-1 focus:outline-none">
                    <iconify-icon icon="mdi:account-circle" class="iconify-user"></iconify-icon>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" x-transition class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                    <p class="block px-4 py-2 text-gray-700">{{ auth()->user()->username }}</p>
                    <hr>
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>

        @endauth

        <!-- Guest Navigation Links -->
        @guest
            <nav class="d-flex align-items-center">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" wire:navigate>Sign In</a>
                <a href="{{ route('register') }}" class="btn btn-primary" wire:navigate>Register</a>
            </nav>
        @endguest
    </div>
</header>