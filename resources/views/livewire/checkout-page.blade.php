<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">
        Checkout
    </h1>
    <form wire:submit.prevent="placeOrder">
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold underline text-gray-700 mb-2">
                            Shipping Address
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-1" for="first_name">
                                    First Name
                                </label>
                                <input wire:model="first_name"
                                    class="w-full rounded-lg border py-2 px-3 @error('first_name') !border-red-500 focus:ring-red-300 @enderror"
                                    id="first_name" type="text">
                                </input>
                                @error('first_name')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1" for="last_name">
                                    Last Name
                                </label>
                                <input wire:model="last_name"
                                    class="w-full rounded-lg border py-2 px-3 @error('last_name') !border-red-500 focus:ring-red-300 @enderror"
                                    id="last_name" type="text">
                                </input>
                                @error('last_name')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block mb-1" for="phone">
                                Phone
                            </label>
                            <input wire:model="phone"
                                class="w-full rounded-lg border py-2 px-3 @error('phone') !border-red-500 focus:ring-red-300 @enderror"
                                id="phone" type="text">
                            </input>
                            @error('phone')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block mb-1" for="address">
                                Address
                            </label>
                            <input wire:model="street_address"
                                class="w-full rounded-lg border py-2 px-3 @error('street_address') !border-red-500 focus:ring-red-300 @enderror"
                                id="address" type="text">
                            </input>
                            @error('street_address')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block mb-1" for="city">
                                City
                            </label>
                            <input wire:model="city"
                                class="w-full rounded-lg border py-2 px-3 @error('city') !border-red-500 focus:ring-red-300 @enderror"
                                id="city" type="text">
                            </input>
                            @error('city')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 mb-1" for="state">
                                    State
                                </label>
                                <input wire:model="state"
                                    class="w-full rounded-lg border py-2 px-3 @error('state') !border-red-500 focus:ring-red-300 @enderror"
                                    id="state" type="text">
                                </input>
                                @error('state')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1" for="zip">
                                    ZIP Code
                                </label>
                                <input wire:model="zip_code"
                                    class="w-full rounded-lg border py-2 px-3 @error('zip_code') !border-red-500 focus:ring-red-300 @enderror"
                                    id="zip" type="text">
                                </input>
                                @error('zip_code')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class=" mt-4 p-4 sm:p-7 dark:bg-white-900">
                            <div class="text-xl font-bold text-gray-700 dark:text-gray mb-2">
                                Prodcut Ordered
                            </div>
                            <ul>
                                @foreach ($cart_items as $ci)
                                    <li class="py-3 sm:py-4" wire:key="{{ $ci['product_id'] }}">
                                        <div class="flex items-center">
                                           
                                                <img alt="{{ $ci['name'] }}" style="width:15%; height:15%; background:#E7FAFF;"
                                                    src="{{ url('storage', $ci['image']) }}">
                                           
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-lg font-medium text-gray-900 truncate">
                                                    {{ $ci['name'] }}
                                                </p>
                                                @if (!empty($ci['variant_name']))
                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                        Variant: {{ $ci['variant_name'] }}
                                                    </p>
                                                @endif
                                                <div class="inline-flex items-center pt-5 text-base font-semibold text-[#F93535]">
                                                {{ Number::currency($ci['total_amount'], 'PHP') }}
                                            </div>
                                            </div>
                                            <p class="text-lg text-gray-500 truncate dark:text-[#585858]">
                                                    x{{ $ci['quantity'] }}
                                                </p>
                                        </div>
                                    </li>
                                @endforeach
                                <hr class="divide-y divide-gray-200 dark:divide-gray-700">
                            </ul>
            
    <div class="flex justify-between items-center pt-3">
        <p class="text-lg font-bold text-gray-700">Delivery Fee</p>
        <p class="text-lg text-gray-900">₱ 49.00</p>
    </div>
    <div class="flex justify-between items-center mt-2">
        <p class="text-lg font-bold text-gray-700">Total 6 Item(s)</p>
        <p class="text-lg font-semibold text-gray-900">₱ 2,673.00</p>
    </div>
</div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-12 lg:col-span-4 p-0 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-lg font-semibold mb-4">
                        <strong>Payment Methods</strong>
                        <hr class="my-2">
                    </div>

					<ul class="space-y-4">
    <li>
        <label class="flex items-center p-2 cursor-pointer bg-white hover:bg-gray-50"> 
            <div class="ml-2 flex items-center"> 
            <img src="{{ asset('assets/images/cod.svg') }}"
            class="h-5 w-5 mr-1">
                <span class="text-lg font-medium text-gray-900">Cash on Delivery</span>
                <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style="margin-left:155px;">
  <label class="form-check-label" for="flexRadioDefault1">
 
  </label>
</div>
            </div>
        </label>
    </li>
    <li class="mt-0">
        <label class="flex items-start p-2 cursor-pointer bg-white hover:bg-gray-50">
            <div class="ml-2 flex-1"> 
                <div class="flex items-center mb-1"> 
                <img src="{{ asset('assets/images/wallet.svg') }}"
                class="h-5 w-5 mr-1">
                    <span class="text-lg font-medium text-gray-900">E-Wallet Payment</span>
					<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style="margin-left:154px;">
  <label class="form-check-label" for="flexRadioDefault1">
 
  </label>
</div>
                </div>
                <ul class="ml-6 space-y-1 mt-3"> 
                    <li class="flex items-center">
                        <div class="ml-2 text-sm text-gray-900">
                            <div class="flex items-center">
                              <img src="{{ asset('assets/images/Gcash.svg') }}"
                                    class="h-5 w-5 mr-2">
                                <span>GCash</span>
                            </div>
                            <span class="text-xs text-gray-500" style="margin-left: 25px;">Payment should be completed within 30 minutes.</span>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <div class="ml-2 text-sm text-gray-900">
                            <div class="flex items-center">
                            <img src="{{ asset('assets/images/maya.svg') }}"
                            class="h-5 w-5 mr-2">
                                <span>PayMaya</span>
                            </div>
                            <span class="text-xs text-gray-500" style="margin-left: 25px;">Payment should be completed within 30 minutes.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </label>
    </li>
</ul>
                    @error('payment_method')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="bg-white mt-4 rounded-xl shadow p-6 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl text-center font-bold  text-gray-700 dark:text-black mb-2">
                        ORDER SUMMARY
                    </div>
                    <div class="flex justify-between mt-5 font-bold">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            {{ Number::currency($grand_total, 'PHP') }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-6 font-bold">
                        <span>
                            Shipping Cost
                        </span>
                        <span>
                            {{ Number::currency(0, 'PHP') }}
                        </span>
                    </div>
                    <hr colspan="6 ">
                    <div class="flex justify-between mb-2 font-bold pt-3">
                        <span>
                            Grand Total
                        </span>
                        <span>
                            {{ Number::currency($grand_total, 'PHP') }}
                        </span>

                    </div>
                    <button type="submit"
                        class="bg-[#00DCE3] mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-[#00CFD6]">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>