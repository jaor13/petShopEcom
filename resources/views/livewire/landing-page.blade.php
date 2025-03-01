<div>

    <!-- Main Content -->
    <main class="container my-4 flex-grow-1 bg-red mb-5">
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
            <div class="intro">
                <h1 class="pawsome-essentials">Pawsome Essentials<br>Delivered with Love!</h1>
                <p class="lorem-ipsum">Lorem ipsum dolor sit amet consectetur. Integer ut sed praesent eget auctor donec
                    egestas orci amet.</p>
                <button class="shop-now">Shop Now</button>
            </div>
        </section>
    </main>

    <!-- Product Grid -->
    @livewire('partials.product-grid')

</div>