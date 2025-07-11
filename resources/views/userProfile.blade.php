<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">
</head>

    <body class="d-flex flex-column min-vh-100">

        <div class="d-flex flex-column min-vh-100">
            
            <header class="container-fluid header-container border-bottom">
                <div class="container d-flex align-items-center justify-content-between">
                    <a href="#" class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Brand Logo" class="img-fluid brand-logo"  >
                    </a>
                    <div class="d-none d-md-flex flex-grow-1 align-items-center search-container">
                        <form id="search-form" class="d-flex align-items-center w-100" action="" method="">
                            <input type="text" class="form-control search-input" placeholder="Search in Aricuz">
                        </form>
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
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    </nav>
                </div>
            </header>
        
            <main class="container my-5 flex-grow-1 bg-red" id="profile-container">
                <section class="my-section">
                    <div class="container-fluid">
                    @livewire('profile-navigation')
                    </div>
                </section>
            </main>

            <footer class="container-fluid custom-footer text-white py-3 mt-auto">
                <div class="container text-center">
                    <p class="m-0">&copy; 2024 MyWebsite. All rights reserved.</p>
                </div>
            </footer>

        </div> 
        
        <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
        <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        @livewireScripts

    </body>

</html>