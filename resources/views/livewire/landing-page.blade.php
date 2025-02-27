<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">

  
</head>
<body>

<div class="d-flex flex-column min-vh-100">

    <!-- Main Content -->
    <main class="container my-5 flex-grow-1 bg-red">
        <section class="slider position-relative">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ asset('assets/images/Slide1.png') }}" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/Slide2.png') }}" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/Slide3.png') }}" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/Slide4.png') }}" class="d-block w-100" alt="Slide 4">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/Slide5.png') }}" class="d-block w-100" alt="Slide 5">
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

            <!-- Intro Section (Overlay on Top of Carousel) -->
            <div class="intro">
                <h1 class="pawsome-essentials">Pawsome Essentials<br>Delivered with Love!</h1>
                <p class="lorem-ipsum">Lorem ipsum dolor sit amet consectetur. Integer ut sed praesent eget auctor donec egestas orci amet.</p>
                <button class="shop-now">Shop Now</button>
            </div>
        </section>
    </main>

    <!-- Product Grid -->
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @for ($i = 0; $i < 10; $i++)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('assets/images/placeholder.png') }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">The Fur Life (The Purr Life) Tofu Fragrance Free Cat Litter 6L</h5>
                            <p class="card-text text-danger fw-bold">₱ 439.00</p>
                            <div class="d-flex align-items-center">
                                <span class="me-2">⭐ 3.5</span>
                                <span class="text-muted">| 100 sold</span>
                            </div>
                            <p class="text-muted">A.A Berces Street San Juan</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</div>

</body>
</html>
