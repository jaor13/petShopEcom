<div class="container-fluid m-3 rounded-3">
    @if($products->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-gray-500">
            No products found 
            @if($query && $category)
                for "{{ $query }}" in "{{ $category }}".
            @elseif($query)
                for "{{ $query }}".
            @elseif($category)
                in "{{ $category }}".
            @else
                .
            @endif
        </h3>
            </div>
        @else
    <div class="row row-cols-1 row-cols-md-5 mx-auto g-3">
        @foreach ($products as $product)
            <div class="col" wire:key="{{ $product->id }}">
                <div class="card h-100 p-2 m-2" style="position: relative;">
                     <a href="{{ url('product/' . $product->slug) }}" wire:navigate>
                        <img src="{{ url('storage/' . $product->images[0]) }}" 
                            class="card-img-top img-fluid bg-[#E7FAFF] rounded-lg" 
                            alt="{{ $product->product_name }}" 
                            style="object-fit: cover; height: 230px;">
                   

                    <!-- Product Name Section -->
                    <h3 class="card-title fw-bold text-truncate mt-2 product-name"  style="margin-left: 4px; font-size: 1.5em; color: rgb(64, 61, 61);">
                        {{ $product->product_name }}
                    </h3>

                    <!-- Pricing and Info Section -->
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 5px; width: 100%;">
                        <div>
                            <div style="color: red; font-weight: bold; font-size: 1.4em;">
                                ₱{{ number_format($product->price, 2) }}
                            </div>
                            <div>
                                <span style="color: gold; font-size: 1.3em;  margin-left: -1px;">★</span> 
                                4.5 | {{ $product->sold_count }} sold
                            </div>
                            <div style="display: flex; align-items: center; white-space: nowrap;">
                                <i class="fa-solid fa-location-dot small" style="margin-right: 6px; margin-left: 3px; opacity: 0.5;"></i>
                                <span style="font-size: 0.8em; margin-left: 1px;">A.A Berces Street, San Juan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <div style="position: absolute; bottom: 30px; right: 17px; display: flex; align-items: center; justify-content: center;">
                        <a href="{{ auth()->check() ? '#' : route('login') }}" 
                            @if(auth()->check()) wire:click.prevent="addToCart({{ $product->id }})" @endif
                            class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300">
                            
                            <div style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #00CED1; border-radius: 10px; padding: 10px; transition: background-color 0.3s ease, transform 0.2s ease;"
                                onmouseover="this.style.backgroundColor='#00B2B5'; this.style.transform='scale(1.1)';"
                                onmouseout="this.style.backgroundColor='#00DCE3'; this.style.transform='scale(1)';">
                                
                                <span wire:target="addToCart({{ $product->id }})">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" stroke='white' stroke-width = '0.3'"
                                        class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="white" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"></path></svg>
                                </span>
                            </div>
                        </a>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @endif


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</div>