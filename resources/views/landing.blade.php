<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Header -->
<header class="container-fluid custom-header border-bottom">
    <div class="container d-flex align-items-center justify-content-between">
       
        <!-- Brand Logo -->
        <a href="#" class="d-flex align-items-center">
            <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Brand Logo" class="img-fluid brand-logo">
        </a>

        <!-- Search Bar (Visible on Medium Screens & Above) -->
        <div class="d-none d-md-flex flex-grow-1 align-items-center search-container">
            <form id="search-form" class="d-flex align-items-center w-100" action="" method="">
                <input type="text" class="form-control search-input" placeholder="Search pet essentials">
                <iconify-icon icon="tabler:search" class="fs-4 me-2 search-icon"></iconify-icon>
            </form>
        </div>

        <!-- Cart Icon -->
        <div class="cart-container">
            <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
        </div>

        <!-- Navigation Links -->
        <nav class="d-flex align-items-center">
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </nav>
    </div>
</header>




    <!-- Main Content -->
    <main class="container my-4 flex-grow-1">
        <section class="slider">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset(path: 'assets/images/slider.svg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset(path: 'assets/images/slider.svg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset(path: 'assets/images/slider.svg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="container-fluid custom-footer text-white py-3 mt-auto">
        <div class="container text-center">
            <p class="m-0">&copy; 2024 MyWebsite. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    
</body>
</html>
