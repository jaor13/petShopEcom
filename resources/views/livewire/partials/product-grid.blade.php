<div class="container py-4">
    <div class="row row-cols-1 row-cols-md-5 g-4"> @foreach ($products as $product)
        <div class="col" wire:key="{{ $product->id }}">
            <div class="card h-100 p-2"> <a href="{{ url('product/' . $product->slug) }}">
                    <img src="{{ url('storage/' . $product->images[0]) }}" class="card-img-top"
                        alt="{{ $product->product_name }}" style="object-fit: cover; height: 200px;"> </a>

                <div class="card-body"  >
                    <h5 class="card-title fw-bold">{{ $product->product_name }}</h5>
                    <p class="card-text text-danger fw-bold">{{ number_format($product->price, 2) }} PHP</p>
                    <div class="d-flex align-items-center">
                        <span class="me-2 text-muted">⭐ 3.5</span>
                        <span class="text-muted">| {{ $product->sold_count }} sold</span>
                    </div>
                    <p class="text-muted">A.A Berces Street San Juan</p>
                    <div class="mt-auto"> <a href="{{ auth()->check() ? '#' : route('login') }}" @if(auth()->check())
                    wire:click.prevent="addToCart({{ $product->id }})" @endif
                            class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                            <span wire:loading.remove class="block" wire:target="addToCart({{ $product->id }})">Add to
                                cart</span>
                            <span wire:loading class="hidden block" wire:target="addToCart({{ $product->id }})">Adding
                                to
                                cart</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>