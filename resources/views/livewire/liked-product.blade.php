<div class="">
    <div class="d-flex justify-content-between align-items-center mr-3 mb-2">
        <div>
            <p class="section-description">See the products you liked.</p>
        </div>

        <div>
            @if($editMode)
                <button class="btn btn-danger me-2" wire:click="deleteSelected">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" style="width: 20px; height: 20px;"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6l-2 14a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2L5 6"></path>
                        <path d="M10 11v6"></path>
                        <path d="M14 11v6"></path>
                        <path d="M4 6h16"></path>
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
                    </svg>
                </button>
            @endif

            <button wire:click="toggleEditMode" class="btn"
                style="background-color: #00DCE3; color: white; border: none;" {{ !$editMode ? 'hidden' : '' }}>
                Done
            </button>

            @if(!$products->isEmpty())
                <button wire:click="toggleEditMode" style="background: none; border: none; color: #00DCE3; cursor: pointer; margin-bottom:12px;"
                    {{ $editMode ? 'hidden' : '' }}>
                    Edit
                </button>
            @endif
        </div>
    </div>

    <div class="container-fluid ms-0 me-3 p-3 mb-2 border border-light shadow-sm rounded-3 bg-white">
        @if($products->isEmpty())
            <div class="text-center p-5">
                <p class="mt-3">No liked products yet</p>
                <p>
                    <span>
                        <a href="{{ url('/products') }}" style="color: #00DCE3; text-decoration: none;">Browse</a>
                    </span>
                    and like products to see them here.
                </p>
            </div>
        @endif


        <div class="row row-cols-1 row-cols-md-3 mx-auto g-3">
            @foreach ($products as $product)
            <div class="col" wire:key="{{ $product->id }}">
                <div class="card h-80 p-2 m-2 d-flex flex-column justify-content-between" style="position: relative;">

                    @if($editMode)
                        <input type="checkbox" wire:model="selectedProducts" value="{{ $product->id }}"
                            class="circle-checkbox">
                    @endif

                    <a href="{{ url('product/' . $product->slug) }}" wire:navigate class="no-underline text-black">                        
                        <img src="{{ url('storage/' . $product->images[0]) }}" 
                            class="card-img-top img-fluid bg-[#E7FAFF] rounded-lg" 
                            alt="{{ $product->product_name }}" 
                            style="object-fit: cover; height: 230px;">
                   

                    <!-- Product Name Section -->
                    <h3 class="card-title fw-bold text-truncate mt-2" style="margin-left: 4px; color: rgb(64, 61, 61);">
                        {{ $product->product_name }}
                    </h3>

                    <!-- Pricing and Info Section -->
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 5px; width: 100%;">
                        <div>
                            <div style="color: red; font-weight: bold; font-size: 1.3em;">
                                ₱{{ number_format($product->price, 2) }}
                            </div>
                            <div>
                                <span style="color: gold; font-size: 1.2em; margin-left: -1px;">★</span> 
                                4.5 | {{ $product->sold_count }} sold
                            </div>
                            <div style="display: flex; align-items: center; white-space: nowrap;">
                                <i class="fa-solid fa-location-dot small" style="margin-right: 6px; margin-left: 2px; opacity: 0.5;"></i>
                                <span style="font-size: 12px;">A.A Berces Street, San Juan</span>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" stroke='white' stroke-width = '0.3'"
                                        class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>