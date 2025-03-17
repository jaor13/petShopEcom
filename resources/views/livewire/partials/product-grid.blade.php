<div class="container-fluid m-3 rounded-3">
    <div class="row row-cols-1 row-cols-md-5 mx-auto">
        @foreach ($products as $product)
            <div class="col" wire:key="{{ $product->id }}">
                <div class="card h-100 p-2 m-2 " style="position: relative;">
                    <a href="{{ url('product/' . $product->slug) }}">
                        <img src="{{ url('storage/' . $product->images[0]) }}" 
                            class="card-img-top img-fluid bg-[#E7FAFF] rounded-lg" 
                            alt="{{ $product->product_name }}" 
                            style="object-fit: cover; height: 230px;">
                    </a>

                    <!-- Product Name Section -->
                    <h3 class="card-title fw-bold text-truncate" style="margin-left: 4px; color: rgb(64, 61, 61);">
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
                                <svg width="25" height="25" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M0 1.55698C0 2.15177 0.456742 2.66044 0.994288 2.66044H5.53363L7.68266 18.6044C7.96519 20.6663 8.97209 21.9588 10.92 21.9588H26.5948C27.118 21.9588 27.5747 21.4941 27.5747 20.8702C27.5747 20.2457 27.118 19.781 26.5948 19.781H11.1481C10.3824 19.781 9.9125 19.1998 9.79158 18.3145L9.57668 16.7897H26.6211C28.5822 16.7897 29.5897 15.4824 29.8716 13.4062L30.9461 5.7242C30.9749 5.54183 30.9929 5.35765 31 5.17279C31 4.47577 30.5163 3.99623 29.7776 3.99623H7.85745L7.58868 2.15239C7.45458 1.03407 7.07864 0.467163 5.70899 0.467163H0.993715C0.456742 0.467163 0 0.975829 0 1.55698ZM9.79216 26.6638C9.79216 27.9853 10.7595 29.0163 11.9813 29.0163C12.2677 29.0188 12.5517 28.9597 12.8168 28.8424C13.0819 28.7251 13.3227 28.5519 13.5252 28.3329C13.7278 28.114 13.888 27.8536 13.9965 27.567C14.105 27.2805 14.1596 26.9734 14.1573 26.6638C14.1586 26.3544 14.1032 26.0479 13.9943 25.7619C13.8854 25.4758 13.7251 25.2159 13.5228 24.9972C13.3205 24.7785 13.0801 24.6052 12.8155 24.4875C12.551 24.3698 12.2674 24.3099 11.9813 24.3113C10.7595 24.3113 9.79216 25.3571 9.79216 26.6638ZM22.3506 26.6638C22.3506 27.9853 23.3311 29.0163 24.5397 29.0163C25.7621 29.0163 26.7289 27.9853 26.7289 26.6638C26.7289 25.3565 25.7621 24.3113 24.5397 24.3113C23.3311 24.3113 22.3506 25.3571 22.3506 26.6638Z" fill="white"/>
                                </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>