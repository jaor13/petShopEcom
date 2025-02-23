<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100">

<header class="header-container">
    <div class="rectangle"></div>
    <div class="brown-red-paw"></div>

    <!-- Search Bar -->
    <div class="search-bar d-flex align-items-center">
        <input type="text" class="form-control search-input" id="searchInput" placeholder="Search in Aricuz">
        <div class="dropdown">
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
                <button class="btn btn-primary search-btn" id="searchButton">
                <i class="bi bi-search"></i>
                </button>
    </div>
                <iconify-icon icon="mdi:cart" class="iconify-cart"></iconify-icon>


            <!-- Sign In Button -->
                <button class="button-frame">
                <span class="sign-in">Sign in</span>
                </button>
</header>

            <main class="positionbg my-4">
            <div class="intro">
                    <span class="pawsome-essentials">Pawsome Essentials<br />Delivered with Love!</span>
                    <span class="lorem-ipsum">Lorem ipsum dolor sit amet consectetur. Integer ut sed praesent eget auctor donec egestas orci amet.</span>
                <button class="rectangle">
                    <span class="shop-now">Shop Now</span>
                </button>
            </div>

                <section class="slider">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset(path: 'assets/images/Slide1.png') }}" class="d-block w-100" alt="Slider 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset(path: 'assets/images/Slide2.png') }}" class="d-block w-100" alt="Slider 2">
                </div>
            </div>

        <!-- Carousel Controls -->
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

<footer class="container-fluid custom-footer text-white py-3 mt-auto">
    <div class="container text-center">
        <p class="m-0">&copy; 2024 MyWebsite. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    
</body>
</html> 