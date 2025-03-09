<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto pt-5 ">
    <section class="overflow-hidden bg-white py-11  dark:bg-gray-800 mb-7 font-normal font-['Poppins']">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full mb-8 md:w-1/2 md:mb-0 p-" x-data="{ mainImage: '{{ url('storage', $product->images[0]) }}' }">
                    <div class="sticky top-0 z-50 overflow-hidden ">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                            <img x-bind:src="mainImage" alt="" class="object-cover w-full lg:h-full ">
                        </div>
                        <p class="max-w-md text-gray-700 dark:text-black-400 font-bold">
                           {{ count($product->images) }} Variations Available
                        </p>
                        <div class="flex-wrap hidden md:flex ">
                            @foreach ($product->images as $image)
                                <div class="w-1/2 p-2 sm:w-1/4" x-on:click="mainImage = @js(url('storage', $image))">
                                    <img src="{{ url('storage', $image) }}" alt="{{ $product->product_name }}"
                                         class="object-cover w-full lg:h-20 cursor-pointer hover:border hover:border-blue-500">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 ">
                    <div class="lg:pl-5">
                        <div class="mb-8">
                            <h2 class="max-w-xl mb-6 text-2xl mt-3 font-bold dark:text-black-400 md:text-4xl">
                                {{ $product->product_name }}
                            </h2>
                            <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px;">
                                <div>
                                    <span style="color: #00DCE3; font-weight: 600;">ARICUZ</span>
                                    <span style="margin: 0 10px; color: #9ca3af;">|</span>
                                    <span style="color: #374151;">PET ESSENTIALS</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <span style="font-family: sans-serif; font-size: 2rem; margin-right: 5px; color:rgb(255, 107, 110);">♡</span>
                                    <span style="font-family: sans-serif; color: #374151;">Add to Favorites</span>
                                </div>
                            </div>
                            <hr style="margin-top: 10px; margin-bottom: 30px; border: 0.6px solid #ccc;">
                            <p class="inline-block mb-6  text-4xl font-bold text-gray-700 dark:text-red-400 ">
                                <span>{{ Number::currency($product->price, 'PHP') }}</span>
                                <span class="text-base font-normal text-gray-500 line-through dark:text-red-400">$2800.99</span>
                            </p>
                        </div>
                        <div class="w-32 mb-8">
                            <div style="display: flex; align-items: center;">
                                <span style="font-size: 18px; font-weight: bold; color: #555; margin-right: 10px;">Quantity:</span>
                                <div style="display: inline-flex; border: 1px solid #00CED1; border-radius: 5px;">
                                    <button wire:click="decreaseQty" style="width: 40px; height: 30px; border: none; background-color: transparent; font-size: 18px; cursor: pointer;">-</button>
                                    <input type="text" wire:model="quantity" value="1" style="width: 40px; height: 30px; text-align: center; border: none; border-left: 1px solid #00CED1; border-right: 1px solid #00CED1; font-size: 18px;" readonly>
                                    <button wire:click="increaseQty" style="width: 40px; height: 30px; border: none; background-color: transparent; font-size: 18px; cursor: pointer;">+</button>
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <span class="text-yellow-500" style="font-size: 1.2em;">&#9733;</span>
                                <span class="ml-1" style="font-size: 1.1em; font-weight: 500;">4.6</span>
                                <span class="ml-1" style="color: #888;">|1198 Sold</span>
                            </div>
                        </div>
                        <div style="display: flex; flex-wrap: wrap; align-items: center;">
                            <a href="{{ auth()->check() ? '#' : route('login') }}"
                               @if(auth()->check()) wire:click.prevent="addToCart({{ $product->id }}, {{ $quantity }})" @endif
                               style="width: 47%; margin-right: 5%; padding: 0.75rem; background-color: #00DCE3; border-radius: 0.375rem; color: white; font-size: 1.125rem; line-height: 1.75rem; font-weight: 700; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#00B2B5';"
                               onmouseout="this.style.backgroundColor='#00DCE3';">
                                <span wire:loading.remove style="display: block;" wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Add to Cart</span>
                                <span wire:loading style="display: none; " wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Adding to cart</span>
                            </a>
                            <a href="{{ auth()->check() ? '#' : route('login') }}"
                               @if(auth()->check()) wire:click.prevent="addToCart({{ $product->id }}, {{ $quantity }})" @endif
                               style="width: 47%; padding: 0.75rem; background-color: white; border-radius: 0.375rem; color: #00DCE3; border: 1px solid #00DCE3; font-size: 1.125rem; line-height: 1.75rem; font-weight: 700; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s ease, color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#E0F7FA'; this.style.color='#00B2B5';"
                               onmouseout="this.style.backgroundColor='white'; this.style.color='#00DCE3';">
                                <span wire:loading.remove style="display: block; align-items:center" wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Buy Now</span>
                                <span wire:loading style="display: none; " wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Processing...</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="overflow-hidden bg-white py-11  dark:bg-gray-800 font-normal font-['Poppins'] mb-7">
    <div class="px-20 pb-6 mt-6 "> 
        <div class="flex flex-col mt-6">
        <div style="background-color: #E0F2F7; padding: 10px; border-radius: 5px;">
  <h2 class="text-xl font-light text-black-300 dark:text-black-400">Product Specification</h2> 
</div>
            <p class="max-w-md text-black-300 dark:text-black-400 ml-4">
                Category: {{ $product->categories->pluck('name')->join(', ') }}
            </p>
            <p class="max-w-md text-gray-300 dark:text-gray-400 ml-4">
                Stocks: {{ $product->stock_quantity }}
            </p>
        </div>
        <div class="flex flex-col mt-6 [&>ul]:list-disc [&>ul]:ml-8">
        <div style="background-color: #E0F2F7;margin-bottom: 10px; padding: 10px; border-radius: 5px;">
  <h2 class="text-xl font-light text-black-300 dark:text-black-400">Product Description</h2> 
</div>
            <p class="max-w-md text-gray-300 dark:text-gray-400 ">
                {!! Str::markdown($product->description) !!}
            </p>
        </div>
    </div>
</div>

<div class="overflow-hidden bg-white py-11  dark:bg-gray-800 font-normal font-['Poppins'] mb-7">
<div class="px-20 pb-6 mt-6 "> 
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">
        4.6 <span class="text-yellow-500">★</span> Product Ratings (10)
      </h2>
      <a href="#" class="text-black-600 hover:text-indigo-800">
        View All <span aria-hidden="true">></span>
      </a>
    </div>
    <hr style="margin-top: 10px; margin-bottom: 30px; border: 1px solid #000000;">
    <div class="space-y-4">
      <div class="bg-white rounded-lg p-4 shadow-sm ">
        <div class="flex items-start mb-2">
          <div class="rounded-full bg-gray-200 w-8 h-8 mr-2"></div>
          <div>
            <div class="font-medium text-black-900">Febby</div>
            <div class="text-yellow-500">⭐⭐⭐⭐☆</div>
            <div class="text-sm text-gray-500">2025-02-14 16:36 | Variation</div>
          </div>
        </div>
        <p class="text-sm text-black-700">Performance: makunit, garo karton</p>
        <p class="text-sm text-black-700">Product Quality: haluyon pa ideilver</p>
      </div>

      <div class="bg-white rounded-lg p-4 shadow-sm ">
        <div class="flex items-start mb-2">
          <div class="rounded-full bg-gray-200 w-8 h-8 mr-2"></div>
          <div>
            <div class="font-medium text-black-900">Fabian</div>
            <div class="text-yellow-500">⭐⭐⭐⭐☆</div>
            <div class="text-sm text-gray-500">2025-02-14 16:36 | Variation</div>
          </div>
        </div>
        <p class="text-sm text-black-700">Performance: makunit, garo karton</p>
        <p class="text-sm text-black-700">Product Quality: haluyon pa ideilver</p>
      </div>

      <div class="bg-white rounded-lg p-4 shadow-sm">
        <div class="flex items-start mb-2">
          <div class="rounded-full bg-gray-200 w-8 h-8 mr-2"></div>
          <div>
            <div class="font-medium text-black-900">Fabian</div>
            <div class="text-yellow-500">⭐⭐⭐⭐☆</div>
            <div class="text-sm text-gray-500">2025-02-14 16:36 | Variation</div>
          </div>
        </div>
        <p class="text-sm text-black-700">Performance: makunit, garo karton, makunit, garo karton, makunit, garo karton</p>
        <p class="text-sm text-black-700">Product Quality: haluyon pa ideilver</p>
      </div>
    </div>
  </div>
</div>

</div>
