<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
    <div class="flex flex-col md:flex-row gap-4">
      <div class="md:w-3/4 mb-4">
        <div>
          <div class="flex justify-between items-center mb-2 bg-white overflow-x-auto rounded-md py-2 px-4">
            <div class="flex items-center space-x-2">
              <input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll"
                class="w-3 h-3 cursor-pointer opacity-50 checked:bg-[#00DCE3] checked:border-[#00DCE3] checked:opacity-100">
              <span class="text-m font-thin opacity-50">
                Select All</span>
            </div>
            <div class="mr-5">
            <button wire:click="removeSelectedItems" class="text-red-500 hover:text-red-700 group opacity-50">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-red-500"
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
            </div>
          </div>

          <div class="bg-white overflow-x-auto rounded-md shadow-md p-6">
            <table class="w-full ">
              <thead class="border-b">
                <tr>
                  <th class="whitespace-nowrap text-left" style="color: #282828;"></th>
                  <th class="font-thin" style="color: #282828; opacity: 0.8;">Product</th>
                  <th class="font-thin text-center" style="color: #282828; opacity: 0.8;">Quantity</th>
                  <th class="font-thin text-center" style="color: #282828; opacity: 0.8;">Price</th>
                  <!-- <th class="text-center font-semibold">Total</th> -->
                  <th class="font-thin text-center" style="color: #282828; opacity: 0.8;">Delete</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cart_items as $item)
                <tr wire:key="{{ $item['product_id'] }}" class="border-b border-gray-100 py-1">
            <td class="py-8">
            <input type="checkbox" wire:model="selected_items" value="{{ $item['cart_id'] }}"
              class="w-3 h-3 cursor-pointer opacity-50" wire:change="updateSummary">
            </td>
            <td class="py-2 pl-2 pr-6 max-w-[350px] truncate"
            style="overflow: hidden; white-space: nowrap;">

            <div class="flex items-center">
              <a href="{{ url('/product/' . $item['slug']) }}">
              <img class="h-16 w-16 mr-2 cursor-pointer" src="{{ url('storage', $item['image']) }}"
                alt="{{ $item['name'] }}">
              </a>
              <div class="max-w-[350px] md:max-w-[400px] lg:max-w-[450px] truncate">
              <span class="font-semibold block truncate">{{ $item['name'] }}</span>
              @if (!empty($item['variant_name']))
          <span class="text-sm text-gray-500">Variant: {{ $item['variant_name'] }}</span>
        @endif
              </div>
            </div>
            </td>

            <td class="py-4 text-center">
            <div class="inline-flex border border-black opacity-50 items-center justify-center">
              <button wire:click="decreaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
              class="w-[30px] h-[25px] text-lg">-</button>
              <span class="w-[35px] h-[25px] text-center border-x border-black text-lg">
              {{ $item['quantity'] }}
              </span>
              <button wire:click="increaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
              class="w-[30px] h-[25px] text-lg">+</button>
            </div>
            </td>

            <!-- <td class="py-4">{{ Number::currency($item['total_amount'], 'PHP') }}</td> -->
            <td class="py-4 text-red-500 font-semibold text-center">
            {{ Number::currency($item['unit_amount'], 'PHP') }}
            </td>
            <td class="py-4 text-red-500 font-semibold text-center">
            <button wire:click="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')"
              class="hover:text-red-500 group opacity-50">
              <span wire:target="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-red-500"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6l-2 14a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2L5 6"></path>
                <path d="M10 11v6"></path>
                <path d="M14 11v6"></path>
                <path d="M4 6h16"></path>
                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
              </svg>
              </span>
              </button>
            </td>
          </tr>
        @empty
      <tr>
        <td colspan="5" class="text-center py-5 text-2xl text-slate-500">
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
        class="bg-blue-500 text-white block text-center py-2 px-4 rounded-md mt-4 w-full">
        Checkout
        </button>
      @endif
        </div>
      </div>
    </div>
  </div>
</div>