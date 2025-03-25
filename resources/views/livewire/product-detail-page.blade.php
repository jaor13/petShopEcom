<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto pt-5 ">
  <section class="overflow-hidden bg-white py-11  dark:bg-gray-800 mb-7 font-normal font-['Afacad']">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-6">
        <!-- Product Image and Slideshow -->
        <div class="w-full mb-8 md:w-1/2 md:mb-0" 
        x-data="{ 
          mainImages: @js(collect($product->images)->map(fn($image) => url('storage', $image))->toArray()), 
          variantImages: @js(collect($product->variants)->map(fn($variant) => url('storage', $variant->image))->toArray()), 
          images: [],
          mainImageIndex: 0, 
          selectedVariant: null, 
          variantName: '{{ $product->variants->count() }} Variations Available',
          stock: {{ $product->stock_quantity }}, 
          price: {{ $product->price }}, 
          variant_price: {{ $product->price }},
          init() {
              // Use product images if available, otherwise use variant images
              this.images = this.mainImages.length > 0 ? this.mainImages : this.variantImages;
          },
          nextImage() {
              this.mainImageIndex = (this.mainImageIndex + 1) % this.images.length;
          },
          prevImage() {
              this.mainImageIndex = (this.mainImageIndex - 1 + this.images.length) % this.images.length;
          },
          selectVariant(variant, image, stock, price) {
              if (this.selectedVariant === variant) {
                  this.selectedVariant = null;
                  this.images = this.mainImages.length > 0 ? this.mainImages : this.variantImages;
                  this.variantName = '{{ $product->variants->count() }} Variations Available';
                  this.stock = {{ $product->stock_quantity }};
                  this.variant_price = {{ $product->price }};  // Reset to base price
              } else {
                  this.selectedVariant = variant;
                  this.images = [image]; // Show only the variant image
                  this.variantName = variant;
                  this.stock = stock;
                  this.variant_price = price;
              }
              this.mainImageIndex = 0;
              }
          }" x-init="init(); setInterval(() => { nextImage() }, 3000)">

          <div class="sticky top-0 z-50 overflow-hidden ">
            <!-- Slideshow -->
            <div class="relative mb-6 lg:mb-10 lg:h-2/4">
              <!-- <button @click="prevImage"
              class="absolute left-2 top-1/2 text-gray-400 px-2 py-1 rounded-l-md">❮</button> -->
              <div style="position: absolute; right: 0; margin-right:-77px; top:18%; transform: translateY(-50%) rotate(270deg); letter-spacing:3px; background-color: #00DCE3; color: white; padding: 10px 50px; font-weight: bolder; font-size: 2.4em; border-radius: 2px; z-index: 1;">
                ARICUZ
              </div>
              <img x-bind:src="images[mainImageIndex]" alt=""
                class="object-cover w-full lg:h-full transition-opacity duration-500 bg-[#E7FAFF] rounded-lg duration-500"   style="width: 580px; height: 560px;">
              <!-- <button @click="nextImage"
              class="absolute right-2 top-1/2 text-gray-400 px-2 py-1 rounded-r-md">❯</button> -->
            </div>

            <p class="max-w-md text-gray-700 font-semibold dark:text-black-400" x-text="variantName"></p>

            <!-- Variant Images -->
            <div class="flex-wrap hidden md:flex">
              @foreach ($product->variants as $variant)
                  <div class="w-1/2 mr-1 sm:w-1/4 border"
                      wire:click="selectVariant('{{ $variant->name }}', {{ $variant->price }}, {{ $variant->stock_quantity }})"
                      x-on:click="selectVariant('{{ $variant->name }}', '{{ url('storage', $variant->image) }}', {{ $variant->stock_quantity }}, {{ $variant->price }})"
                      :class="{ 'border-2 border-[#00DEC3]': selectedVariant === '{{ $variant->name }}' }">
      
                      <img src="{{ url('storage', $variant->image) }}" alt="{{ $variant->name }}"
                          class="w-35 lg:h-25 cursor-pointer hover:border hover:border-[#00DEC3]"
                          :class="{ 'border-2 border-[#00DEC3]': selectedVariant === '{{ $variant->name }}' }">
                  </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Product Details -->
        <div class="w-full px-4 md:w-1/2">
          <div class="lg:pl-5">
            <div class="mb-8">
              <h2 class="max-w-xl mb-6 text-2xl font-bold dark:text-[#3E3939] md:text-4xl">
                {{ $product->product_name }}
              </h2>

              <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px;">
                <div>
                  <span style="color: #00DCE3; font-weight: 600;">ARICUZ</span>
                  <span style="margin: 0 10px; color: #9ca3af;">|</span>
                  <span style="color: #374151;">PET ESSENTIALS</span>
                </div>
                <div style="display: flex; align-items: center;">
                  <div wire:click="addToLiked({{ $product->id }})" class="like-button-container">
                    <span class="like-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FF8284"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="bevel" class="like-icon hover:fill-red-500 mr-2 ">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                        </svg>
                    </span>
                  </div>
                  <span style="color: #374151;">Add to Favorites</span>
                </div>
              </div>
              <hr style="margin-top: 10px; margin-bottom: 30px; border: 0.6px solid #ccc;"></hr>
              <p class="inline-block mb-6  text-4xl font-bold  text-[#F93535] ">
                <span>{{ Number::currency($variant_price, 'PHP') }}</span>
                <!-- <span class="text-base font-normal  line-through text-[#F93535]">$2800.99</span> -->
              </p>
            </div>

            <div class="w-32 mb-8">
              <div style="display: flex; align-items: center;">
                <span style="font-size: 18px; font-weight: bold; color: #555; margin-right: 10px;">Quantity:</span>
                <div style="display: inline-flex; border: 1px solid #00CED1; border-radius: 5px;">
                <button wire:click="decreaseQty"
                        style="width: 40px; height: 30px; border: none; background-color: transparent; font-size: 18px; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#E0FFFF';" 
                        onmouseout="this.style.backgroundColor='transparent';">-</button>
                <input type="text" wire:model="quantity" value="1"
                      style="width: 40px; height: 30px; text-align: center; border: none; border-left: 1px solid #00CED1; border-right: 1px solid #00CED1; font-size: 18px;"
                      readonly>
                <button wire:click="increaseQty"
                        style="width: 40px; height: 30px; border: none; background-color: transparent; font-size: 18px; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#E0FFFF';" 
                        onmouseout="this.style.backgroundColor='transparent';">+</button>
                </div>
              </div>
              <div class="flex items-center mt-4">
                <span class="text-yellow-500" style="font-size: 1.2em;">&#9733;</span>
                <span class="ml-1" style="font-size: 1.1em; font-weight: 500;">{{ number_format($averageRating, 1) }}</span>
                <span class="ml-1" style="color: #888;">|{{ $product->sold_count }} Sold</span>
              </div>
            </div>

            <div style="display: flex; flex-wrap: wrap; align-items: center;">
              <a href="{{ auth()->check() ? '#' : route('login') }}" @if(auth()->check())
                wire:click.prevent="addToCart({{ $product->id }}, {{ $quantity }})" @endif
                style="width: 47%; margin-right: 5%; padding: 0.75rem; background-color: #00DCE3; border-radius: 0.375rem; color: white; font-size: 1.125rem; line-height: 1.75rem; font-weight: 700; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s ease;"
                onmouseover="this.style.backgroundColor='#00B2B5';" onmouseout="this.style.backgroundColor='#00DCE3';">
                <span wire:loading.remove style="display: block;"
                  wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Add to Cart</span>
                <span wire:loading style="display: none; "
                  wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Adding to cart</span>
              </a>
              <a href="{{ auth()->check() ? '#' : route('login') }}" @if(auth()->check())
                wire:click.prevent="addToCart({{ $product->id }}, {{ $quantity }})" @endif
                style="width: 47%; padding: 0.75rem; background-color: white; border-radius: 0.375rem; color: #00DCE3; border: 1px solid #00DCE3; font-size: 1.125rem; line-height: 1.75rem; font-weight: 700; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s ease, color 0.3s ease;"
                onmouseover="this.style.backgroundColor='#E0F7FA'; this.style.color='#00B2B5';"
                onmouseout="this.style.backgroundColor='white'; this.style.color='#00DCE3';">
                <span wire:loading.remove style="display: block; align-items:center"
                  wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Buy Now</span>
                <span wire:loading style="display: none; "
                  wire:target="addToCart({{ $product->id }}, {{ $quantity }})">Processing...</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="overflow-hidden bg-white py-11  dark:bg-gray-800 mb-7">
    <div class="px-20 pb-6 mt-6 ">
      <div class="flex flex-col mt-6">
        <div style="background-color: #E0F2F7; padding: 10px; border-radius: 5px;">
          <h2 class="text-xl font-light text-black-300 dark:text-black-400">Product Specification</h2>
        </div>
        <p class="max-w-md text-black-300 dark:text-black-400 ml-4 mt-2">
          Category: {{ $product->categories->pluck('name')->join(', ') }}
        </p>
        <p class="max-w-md text-gray-300 dark:text-gray-400 ml-4 mt-2">
          Stocks: {{ $product->stock_quantity }}
        </p>
      </div>
      <div class="flex flex-col mt-6 [&>ul]:list-disc [&>ul]:ml-8">
        <div style="background-color: #E0F2F7;margin-bottom: 10px; padding: 10px; border-radius: 5px;">
          <h2 class="text-xl font-light text-black-300 dark:text-black-400">Product Description</h2>
        </div>
        <p class="max-w-md text-gray-300 dark:text-gray-400">
          {!! Str::markdown(preg_replace('/^\s*-\s*/m', '- ', $product->description)) !!}
        </p>
      </div>
    </div>
  </div>

  <div class="overflow-hidden bg-white py-11 dark:bg-gray-800 font-normal mb-7">
    <div class="px-20 pb-6 mt-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-900">
                {{ number_format($averageRating, 1) }} <span class="text-yellow-500">★</span> Product Ratings ({{ count($reviews) }})
            </h2>
        </div>
        <hr style="margin-top: 10px; margin-bottom: 30px; border: 1px solid #000000;">
        <div class="space-y-4">
        @forelse ($reviews as $review)
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <div class="flex items-start mb-2">
                <div class="rounded-full bg-gray-200 w-8 h-8 mr-2">
                @if ($review->user->profile_picture)
                  <img src="{{ url('storage/' . $review->user->profile_picture) }}" 
                     alt="User Profile" 
                     class="rounded-full w-8 h-8 mr-2">
                @else
                  <i class="fa-solid fa-user-circle" style="font-size: 2rem; margin-bottom: 6px; color: #555;"></i>
                @endif
                </div>
                <div>
                  <div class="font-medium text-black-900">{{ $review->user->username ?? 'Anonymous' }}</div>
                  <div class="text-yellow-500">
                      {!! str_repeat('⭐', $review->rating) !!}
                      {!! str_repeat('☆', 5 - $review->rating) !!}
                  </div>
                  <p class="text-sm text-black-700">{{ $review->comment }}</p>

                  @if(is_array($review->images) && count($review->images) > 0)
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($review->images as $image)
                            <img src="{{ url('storage/' . $image) }}"  alt="Review Image" class="rounded-lg w-32 h-32 object-cover">
                        @endforeach
                    </div>
                  @endif
                  <div class="text-sm text-gray-500">{{ $review->created_at->format('Y-m-d H:i') }} | {{ $review->variant->name ?? 'No Variant' }}</div>
                </div>
              </div>
          </div>
        @empty
          <p class="text-center text-gray-500">No reviews yet.</p>
        @endforelse
        </div>
    </div>
  </div>

  <div class="container-fluid p-2 rounded-3" style="background-color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 95%; margin: 0 auto; margin-top: 1.5em;">
      <h1 style="font-weight: bold; color: #262525;" class="text-2xl"> Products of Same Category </h1>
        <a href="{{ route('products', ['category' => $product->categories->first()->name ?? '']) }}"
          style="font-size: 18px; color: rgb(145, 143, 143); text-decoration: none;">
          View All > </a>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
      @livewire('partials.product-grid', ['category' => $product->categories->first()->name ?? '', 'limit' => 5, 'excludeProductId' => $product->id])
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    if (window.FontAwesome) {
        window.FontAwesome.dom.i2svg();
    }
});


</script>