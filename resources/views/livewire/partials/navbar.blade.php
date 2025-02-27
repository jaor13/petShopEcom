<!-- Header -->
<header class="container-fluid header-container border-bottom">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Brand Logo -->
        <a href="#" class="d-flex align-items-center">
            <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Brand Logo" class="img-fluid brand-logo">
        </a>

        <!-- Search Bar with Categories -->
        <div class="d-none d-md-flex flex-grow-1 align-items-center search-container">
            <form id="search-form" class="d-flex align-items-center w-100" action="" method="">
                <input type="text" class="form-control search-input" placeholder="Search in Aricuz">
            </form>
            <!-- Category Dropdown -->
            <div class="dropdown category-dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle category-btn" type="button" data-bs-toggle="dropdown">
                    All Categories
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Dog</a></li>
                    <li><a class="dropdown-item" href="#">Cat</a></li>
                    <li><a class="dropdown-item" href="#">Rabbit</a></li>
                    <li><a class="dropdown-item" href="#">Fish</a></li>
                    <li><a class="dropdown-item" href="#">Bird</a></li>
                    <li><a class="dropdown-item" href="#">Hamster</a></li>
                </ul>
            </div>
                <button type="submit" class="btn btn-primary search-btn">
                    <iconify-icon icon="tabler:search"></iconify-icon>
                </button>

          
        </div>

        <!-- Cart Icon -->
        <div class="cart-container">
            <iconify-icon icon="mdi:cart" class="iconify-cart"></iconify-icon>
        </div>
        
        <!-- Navigation Links -->
        <nav class="d-flex align-items-center">
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Sign In</a>
        </nav>
    </div>
</header>