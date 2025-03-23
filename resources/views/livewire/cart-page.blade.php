<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
    <div class="flex flex-col md:flex-row gap-4">
      <div class="md:w-3/4 mb-4">
        <div>
          <div class="flex justify-between items-center mb-2 bg-white overflow-x-auto rounded-md py-2 px-4">
            <div class="flex items-center space-x-2">
            <input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll"
            class="w-3 h-3 cursor-pointer  checked:bg-[#00DCE3] checked:border-[#00DCE3] checked:opacity-100">
            <span class="text-m font-thin ">
                Select All</span>
            </div>
            <div class="mr-5">
            <button wire:click="removeSelectedItems" class="text-red-500  group  text-[#282828]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4 mr-5 pt-1 " viewBox="0 0 24 24" fill="none"
              stroke="#969696" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="bevel">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
            </button>
            </div>
          </div>

          <div class="bg-white overflow-x-auto rounded-md shadow-md p-6">
            <table class="w-full ">
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
                <tr wire:key="{{ $item['product_id'] }}" class="border-b border-gray-100 py-1">
            <td class="py-8">
            <input type="checkbox" wire:model="selected_items" value="{{ $item['cart_id'] }}"
              class="w-3 h-3 cursor-pointer " wire:change="updateSummary">
            </td>
            <td class="py-2 pl-2 pr-6 max-w-[350px] truncate"
            style="overflow: hidden; white-space: nowrap;">
            <div class="flex items-center">
                  <a href="{{ url('/product/' . $item['slug']) }}" wire:navigate>
              <img class="h-16 w-16 mr-2 cursor-pointer" src="{{ url('storage', $item['image']) }}"   alt="{{ $item['name'] }}">
              </a>
              <div class="max-w-[350px] md:max-w-[400px] lg:max-w-[450px] truncate">
              <span class="font-semibold block truncate">{{ $item['name'] }}</span>
              @if (!empty($item['variant_name']))
              <span class="text-sm text-gray-500">Variant: {{ $item['variant_name'] }}</span>
              @endif
              </div>
              </div>
              </td>
              <td>
          <p class="text-center  font-semibold text-[#F93535] ">
         {{ Number::currency($item['unit_amount'], 'PHP') }}
          </p>
        </td>
              <td class="py-4 text-center">
            <div class="inline-flex border border-black opacity-60 items-center justify-center">
              <button wire:click="decreaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
              class="w-[30px] h-[25px] text-lg">-</button>
              <span class="w-[35px] h-[25px] pt-1 text-center border-x border-black  text-sm">
              {{ $item['quantity'] }}
              </span>
              <button wire:click="increaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
              class="w-[30px] h-[25px] text-lg">+</button>
            </div>
            </td>
              <!-- <td class="py-4">{{ Number::currency($item['total_amount'], 'PHP') }}</td> -->
              <td class="py-4 text-red-500 font-semibold text-center">
            {{ Number::currency($item['total_amount'], 'PHP') }}
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
        <td colspan="10" class="text-center ml-6 p-5 text-2xl text-slate-500">
        No items available in cart
        </td>
      </tr>
    @endforelse
              </tbody>
            </table>
          </div>
        </div>
        </div>
      <div class="md:w-1/4">
        <div class="bg-white rounded-md shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Summary</h2>
          <div class="flex justify-between mb-2">
            <span>Subtotal</span>
            <span>{{ Number::currency($grand_total, 'PHP') }}</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Shipping</span>
            <span>{{ Number::currency($shipping_fee, 'PHP') }}</span>
          </div>
          <hr class="my-2">
          <div class="flex justify-between mb-2">
            <span class="font-semibold">Grand Total</span>
            <span class="font-semibold">{{ Number::currency($grand_total + $shipping_fee, 'PHP') }}</span>
          </div>
          @if($cart_items)
        <button wire:click="goToCheckout"
        class="bg-[#00DCE3] hover:bg-[#00B0B6] font-semibold text-white block text-center py-2 px-4 rounded-md mt-4 w-full">
        Checkout
        </button>
      @endif
      </div>
      </div>
    </div>
  </div>
  </div>