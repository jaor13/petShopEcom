<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-4">
        <!-- Product Image and Slideshow -->
        <div class="w-full mb-8 md:w-1/2 md:mb-0" x-data="{ 
          mainImages: @js(collect($product->images)->map(fn($image) => url('storage', $image))->toArray()), 
          images: @js(collect($product->images)->map(fn($image) => url('storage', $image))->toArray()), 
          mainImageIndex: 0, 
          selectedVariant: null, 
          variantName: '{{ $product->variants->count() }} Variations Available',
          stock: {{ $product->stock_quantity }}, 
          price: {{ $product->price }}, 
          nextImage() {
            this.mainImageIndex = (this.mainImageIndex + 1) % this.images.length;
          },
          prevImage() {
            this.mainImageIndex = (this.mainImageIndex - 1 + this.images.length) % this.images.length;
          },
          selectVariant(variant, image, stock, price) {
            if (this.selectedVariant === variant) {
              this.selectedVariant = null;
              this.images = this.mainImages;
              this.variantName = '{{ $product->variants->count() }} Variations Available';
              this.stock = {{ $product->stock_quantity }};
              this.price = {{ $product->price }};  // Reset to base price
            } else {
              this.selectedVariant = variant;
              this.images = [image];
              this.variantName = variant;
              this.stock = stock;
              
              // Convert price to a number before assigning (to prevent Alpine.js from ignoring it)
              this.price = Number(price);
            }
            this.mainImageIndex = 0;
          }
        }" x-init="setInterval(() => { nextImage() }, 3000)">
          <div class="sticky top-0 z-50 overflow-hidden">
            <!-- Slideshow -->
            <div class="relative mb-6 lg:mb-10 lg:h-2/4">
              <button @click="prevImage"
                class="absolute left-2 top-1/2 bg-gray-600 text-white px-2 py-1 rounded-l-md">❮</button>
              <img x-bind:src="images[mainImageIndex]" alt=""
                class="object-cover w-full lg:h-full transition-opacity duration-500">
              <button @click="nextImage"
                class="absolute right-2 top-1/2 bg-gray-600 text-white px-2 py-1 rounded-r-md">❯</button>
            </div>

            <p class="max-w-md text-gray-700 dark:text-gray-400" x-text="variantName"></p>

            <!-- Variant Images -->
            <div class="flex-wrap hidden md:flex">
              @foreach ($product->variants as $variant)
          <div class="w-1/2 p-2 sm:w-1/4" wire:click="$set('variant_name', '{{ $variant->name }}')"
          x-on:click="selectVariant('{{ $variant->name }}', '{{ url('storage', $variant->image) }}', {{ $variant->stock_quantity }}, {{ $variant->price }})">
          <img src="{{ url('storage', $variant->image) }}" alt="{{ $variant->name }}"
            class="object-cover w-full lg:h-20 cursor-pointer hover:border hover:border-blue-500"
            :class="selectedVariant === '{{ $variant->name }}' ? 'border-2 border-blue-500' : ''">
          </div>
        @endforeach
            </div>
          </div>

          <div class="px-6 pb-6 mt-6 border-t border-gray-300 dark:border-gray-400">
            <div class="flex flex-col mt-6">
              <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">Product Specification</h2>
              <p class="max-w-md text-gray-700 dark:text-gray-400 ml-4">
                Category: {{ $product->categories->pluck('name')->join(', ') }}
              </p>
              <p class="max-w-md text-gray-700 dark:text-gray-400 ml-4">
                Stocks: <span x-text="stock"></span>
              </p>
            </div>

            <div class="flex flex-col mt-6">
              <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">Product Description</h2>
              <p class="max-w-md text-gray-700 dark:text-gray-400">
                {!! Str::markdown($product->description) !!}
              </p>
            </div>
          </div>
        </div>

        <!-- Product Details -->
        <div class="w-full px-4 md:w-1/2">
          <div class="lg:pl-20">
            <div class="mb-8">
              <h2 class="max-w-xl mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                {{ $product->product_name }}
              </h2>
              <p class="inline-block mb-6 text-4xl font-bold text-gray-700 dark:text-gray-400">
                <span>{{ Number::currency($product->price, 'PHP') }}</span>
              </p>
            </div>

            <!-- Quantity Selector -->
            <div class="w-32 mb-8">
              <label
                class="w-full pb-1 text-xl font-semibold text-gray-700 border-b border-blue-300 dark:border-gray-600 dark:text-gray-400">Quantity</label>
              <div class="relative flex flex-row w-full h-10 mt-6 bg-transparent rounded-lg">
                <button wire:click="decreaseQty"
                  class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">-</span>
                </button>
                <input type="number" wire:model="quantity" readonly
                  class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black"
                  placeholder="1">
                <button wire:click="increaseQty"
                  class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>
              </div>
            </div>


            <!-- Add to Cart Button -->
            @if(auth()->check())
    <button wire:click.prevent="addToCart({{ $product->id }})"
        class="w-full p-4 bg-blue-500 rounded-md lg:w-2/5 text-gray-50 hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-700">
        <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add to cart</span>
    </button>
@else
    <a href="{{ route('login') }}"
        class="w-full p-4 bg-blue-500 rounded-md lg:w-2/5 text-gray-50 hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-700">
        Login to Add to Cart
    </a>
@endif


          </div>
        </div>
      </div>
    </div>
  </section>
</div>