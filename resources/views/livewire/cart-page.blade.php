<div class="w-full max-w-[90rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
    <div class="flex flex-col md:flex-row gap-4">
      <div class="md:w-3/4">
        <div class="bg-white overflow-x-auto rounded-lg shadow-md p-4 mb-3 flex items-center justify-between">
          <label class="flex items-center ml-7">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600">
            <span class="ml-2 text-gray-700">Select All (8 Items)</span>
          </label>
          <button class="text-[#00DCE3] hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-16" viewBox="0 0 24 24" fill="none"
              stroke="#969696" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="bevel">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
          </button>
        </div>
        <div class="bg-white overflow-x-auto rounded-lg shadow-md p-12 mb-4">
          <table class="w-full">
            <thead>
              <tr>
                <th class="text-left font-semibold">Product</th>
                <th></th>
                <th class="text-center font-semibold" style="width: 149px;">Price</th>
                <th class="text-center font-semibold" style="width: 119px;">Quantity</th>
                <th class="text-center font-semibold" style="width: 149px;">Total Price</th>
                <th class="text-center font-semibold" style="width: 99px;">Delete</th>
              </tr>
            </thead>
            <tr>
              <td colspan="6">
                <hr>
              </td>
            </tr>
            <tbody>
              @forelse ($cart_items as $item)
            <tr wire:key="{{ $item['product_id'] }}">
            <td class="py-4">
              <div class="flex items-center">
              <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600">
              <a href="{{ url('/product/' . $item['slug']) }}">
                <img class="h-16 w-16 ml-6 cursor-pointer" src="{{ url('storage', $item['image']) }}"
                alt="{{ $item['name'] }}">
              </a>
              </div>
            </td>
            <td>
              <div class="m-3">
              <span class="font-semibold block ml-5">{{ $item['name'] }}</span>

              @if (!empty($item['variant_name']))
          <span class="text-sm text-gray-500 ml-5">Variant: {{ $item['variant_name'] }}</span>
        @endif
              </div>
        </div>
        </td>
        <td>
          <p class="text-center text-[#F93535] ">
          <strong>{{ Number::currency($item['unit_amount'], 'PHP') }}</strong>
          </p>
        </td>
        <td class="py-4 text-center">
          <div class="inline-flex items-center border rounded-sm h-8">
          <button wire:click="decreaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
            class="px-3.5 py-3.5 text-sm font-semibold border-r hover:bg-gray-100 focus:outline-none focus:ring focus:border-blue-200 h-full flex items-center justify-center">
            -
          </button>
          <span class="w-8 text-center text-sm font-semibold h-full flex items-center justify-center">
            {{ $item['quantity'] }}
          </span>
          <button wire:click="increaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
            class="px-3.5 py-3.5 text-sm font-semibold border-l hover:bg-gray-100 focus:outline-none focus:ring focus:border-blue-200 h-full flex items-center justify-center">
            +
          </button>
          </div>
        </td>
        <td class="py-4 text-center text-[#F93535]">
          <strong>{{ Number::currency($item['total_amount'], 'PHP') }}</strong>
        </td>
        <td class="py-4 text-center">
          <button wire:click="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')"
          class="text-[#282828]">
          <div style="display: inline-flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none"
            stroke="#969696" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="bevel" wire:loading.remove
            wire:target="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
            <div wire:loading class="hidden block flex items-center "
            wire:target="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')">
            <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-5 w-5 mr-1 text-[#F93535]" fill="none"
              viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
              </path>
            </svg>

            </div>
          </div>
          </button>
        </td>
        </tr>

      @empty
    <tr>
      <td colspan="text-[#F6F6F6]" class="text-center py-5 text-2xl text-slate-500">
      No items available in cart
      </td>
    </tr>
  @endforelse
        </tbody>
        </table>
      </div>

    </div>
    <div class="md:w-1/4">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4 text-center">Summary</h2>
        <div class="flex justify-between mb-2">
          <span>Subtotal</span>
          <span>{{ Number::currency($grand_total, 'PHP') }}</span>
        </div>
        <div class="flex justify-between mb-2">
          <span>Shipping</span>
          <span>{{ Number::currency(0, 'PHP') }}</span>
        </div>
        <hr class="my-2">
        <div class="flex justify-between mb-2">
          <span class="font-semibold">Grand Total</span>
          <span class="font-semibold text-[#F93535] ">{{ Number::currency($grand_total, 'PHP') }}</span>
        </div>
        @if($cart_items)
      <a href="/checkout"
        class="bg-[#00DCE3] text-white block text-center py-2 px-4 rounded-lg mt-4 w-full"><strong>Checkout</strong></a>
    @endif
      </div>
    </div>
  </div>
</div>
</div>