<!-- Product Grid -->
<div class="container py-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($products as $product)
                <div class="col" wire:key="{{ $product->id }}">
                    <div class="card">
                        <a href="{{ url('product/' . $product->slug) }}">
                        <img src="{{ asset('storage/' . $product->images[0]) }}" class="card-img-top" alt="{{ $product->product_name }}">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $product->product_name }}</h5>
                            <p class="card-text text-danger fw-bold">{{ number_format($product->price, 2) }} PHP</p>
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-muted">⭐ 3.5</span>
                                <span class="text-muted">| 100 sold</span>
                            </div>
                            <p class="text-muted">A.A Berces Street San Juan</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>