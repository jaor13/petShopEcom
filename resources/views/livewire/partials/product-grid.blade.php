<!-- Product Grid -->
<div class="container py-4">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @for ($i = 0; $i < 10; $i++)
            <div class="col">
                <div class="card">

                    <a href="{{ url('product/' . $i) }}">
                        <img src="{{ asset('assets/images/placeholder.png') }}" class="card-img-top" alt="Product Image">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title fw-bold">The Fur Life (The Purr Life) Tofu Fragrance Free Cat Litter 6L
                        </h5>
                        <p class="card-text text-danger fw-bold">₱ 439.00</p>
                        <div class="d-flex align-items-center">
                            <span class="me-2 text-muted">⭐ 3.5</span>
                            <span class="text-muted">| 100 sold</span>
                        </div>
                        <p class="text-muted">A.A Berces Street San Juan</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>