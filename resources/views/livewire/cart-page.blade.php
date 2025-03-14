<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
    <div class="flex flex-col md:flex-row gap-4">
      <div class="md:w-3/4">
        <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
          <table class="w-full">
            <thead>
              <tr>
                <th class="whitespace-nowrap text-left">
                  <div class="flex items-center space-x-2">
                    <input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll"
                      class="w-4 h-4 cursor-pointer">
                    <span class="text-sm font-thin">Select All</span>
                  </div>
                </th>
                <th class="text-center font-semibold">Product</th>
                <th class="text-center font-semibold">Price</th>
                <th class="text-center font-semibold">Quantity</th>
                <th class="text-center font-semibold">Total</th>
                <th class="text-center font-semibold">
                  <button wire:click="removeSelectedItems" class="text-red-500 hover:text-red-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M6 8a1 1 0 011 1v5a1 1 0 01-2 0V9a1 1 0 011-1zm4 0a1 1 0 011 1v5a1 1 0 01-2 0V9a1 1 0 011-1zm4 0a1 1 0 011 1v5a1 1 0 01-2 0V9a1 1 0 011-1z"
                          clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                          d="M2 5a1 1 0 011-1h2.586A2 2 0 018 3h4a2 2 0 011.414.586L16 4h2a1 1 0 011 1v1a1 1 0 01-1 1h-1v8a3 3 0 01-3 3H6a3 3 0 01-3-3V7H2a1 1 0 01-1-1V5z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </button>
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($cart_items as $item)
          <tr wire:key="{{ $item['product_id'] }}">
          <td class="py-4">
            <input type="checkbox" wire:model="selected_items" value="{{ $item['cart_id'] }}"
            class="w-4 h-4 cursor-pointer" wire:change="updateSummary">

          </td>
          <td class="py-4">
            <div class="flex items-center">
            <a href="{{ url('/product/' . $item['slug']) }}">

              <img class="h-16 w-16 mr-4 cursor-pointer" src="{{ url('storage', $item['image']) }}"
              alt="{{ $item['name'] }}">
            </a>
            <div>
              <span class="font-semibold block">{{ $item['name'] }}</span>
              @if (!empty($item['variant_name']))
          <span class="text-sm text-gray-500">Variant: {{ $item['variant_name'] }}</span>
        @endif
            </div>
            </div>
          </td>
          <td class="py-4">{{ Number::currency($item['unit_amount'], 'PHP') }}</td>
          <td class="py-4">
            <div class="flex items-center">
            <button wire:click="decreaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
              class="border rounded-md py-2 px-4 mr-2">-</button>
            <span class="text-center w-8">{{ $item['quantity'] }}</span>
            <button wire:click="increaseQty({{ $item['product_id'] }}, '{{ $item['variant_name'] ?? '' }}')"
              class="border rounded-md py-2 px-4 ml-2">+
            </button>
          </td>
          <td class="py-4">{{ Number::currency($item['total_amount'], 'PHP') }}</td>
          <td>
            <button wire:click="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')"
            class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
            <span wire:loading.remove class="block"
              wire:target="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')">Remove</span>
            <span wire:loading class="hidden block"
              wire:target="removeItem({{ $item['product_id'] }}, '{{ $item['variant_name'] }}')">Removing</span>
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
      <div class="md:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Summary</h2>
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
            <span class="font-semibold">{{ Number::currency($grand_total, 'PHP') }}</span>
          </div>
          @if($cart_items)
        <button wire:click="goToCheckout"
        class="bg-blue-500 text-white block text-center py-2 px-4 rounded-lg mt-4 w-full">
        Checkout
        </button>
      @endif
        </div>
      </div>
    </div>
  </div>
</div>