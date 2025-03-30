<div class="container py-5">
    <h1 class="h2 font-weight-bold text-dark mb-1">
        Checkout
    </h1>
    <form wire:submit.prevent="placeOrder">
        <div class="row">

            <div class="col-lg-8 mb-4">
                <div>
                    <div class="card-body">
                        <div class="border p-4 mb-0.5 rounded-1 shadow-sm bg-white">
                            <!-- Check if the user has an address -->
                            @if (!$use_existing_address)
                                <!-- Add Address Button -->
                                <button type="button" class="btn " wire:click="openAddressModal">
                                    <i class="fas fa-plus-circle mr-2 ml-3"></i> 
                                    Add Address
                                </button>
                            @else

                                <!-- Non-Editing View -->
                                @if (!$is_editing)
                                    <div class="d-flex align-items-center mr-3 ml-5">
                                        <!-- Location Pin Icon -->
                                        <div class="text-primary flex-shrink-0 " style="margin-bottom: 40px;">
                                            <i class="fa-solid fa-location-dot fa-lg " style="color:rgb(255, 29, 29)"></i>
                                        </div>

                                        <!-- Address Details -->
                                        <div class="ml-3 flex-grow-1">
                                            <h5 class="font-semibold text-dark mb-1 text-xl">
                                                {{ $first_name }} {{ $last_name }}
                                            </h5>
                                            <p class="text-muted text-small mb-0">
                                                (+63) {{ $phone }}
                                            </p>
                                            <p class="text-muted text-small mb-0">
                                                {{ $street_address }}, {{ $city }}, {{ $zip_code }}, {{ $province }}
                                            </p>
                                        </div>

                                        <!-- Edit Icon -->
                                        <div class="ml-auto mr-3">
                                            <button type="button" class="btn btn-link text-primary p-0" wire:click="openAddressModal(true)">
                                            <i class="fas fa-edit" style="color: #00DCE3;"></i> 
                                        </button>
                                        <span style="color: #00DCE3;">Edit</span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-5 bg-white border rounded-1 shadow-sm">
                        <div class="mt-0">
                            <h5 class="font-bold text-xl text-black-400 -mb-1  border-bottom">
                                Products Ordered
                            </h5>
                            
                            <ul class="list-unstyled">
                                @foreach ($cart_items as $ci)
                                    <li class="py-3 border-bottom" wire:key="{{ $ci['product_id'] }}">
                                        <div class="d-flex align-items-center">
                                            <img alt="{{ $ci['name'] }}" class="img-fluid bg-[#E7FAFF] rounded-lg " style="width: 15%; height: 15%;" src="{{ url('storage', $ci['image']) }}">
                                            <div class="ml-4 flex-grow-1">
                                                <p class="text-xl font-medium text-gray-900 truncate">
                                                    {{ $ci['name'] }}
                                                </p>
                                                @if (!empty($ci['variant_name']))
                                                    <p class="text-muted small mb-1">
                                                        Variant: {{ $ci['variant_name'] }}
                                                    </p>
                                                @endif
                                                <div class="inline-flex items-center pt-2 text-base font-semibold text-[#F93535]">
                                                    {{ Number::currency($ci['total_amount'], 'PHP') }}
                                                </div>
                                            </div>
                                            <p class="text-meduim text-gray-500 truncate dark:text-[#585858]">
                                                x{{ $ci['quantity'] }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        
                        <div class="flex justify-between items-center pt-3">
    </div>
    <div class="flex justify-between items-center mt-2">
        <p class="text-lg font-bold text-gray-700">Total of {{ $total_items }} Item(s)</p>
        <p class="text-lg font-semibold text-gray-900">{{ Number::currency($grand_total-$shipping_amount, 'PHP') }}</p>
    </div>
</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class=" bg-white border rounded-1 shadow-sm border-0 shadow-sm mb-1 -ml-5  mt-0.4">
                    <div class="card-body p-4 mr-3 ml-3">
                        <h5 class="text-lg font-bold text-gray-700 dark:text-gray mb-2">
                            Payment Methods
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-0">
                                <label class="d-flex align-items-center p-2 bg-white ">
                                <div class="ml-2 flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="{{ asset('assets/images/cod.svg') }}" class="h-5 w-5 mr-1 mb-1">
                                        <span class="h6 font-weight-medium text-dark">Cash on Delivery</span>
                                        <div class="form-check ml-auto">
                                            <input class="form-check-input" type="radio" name="payment_method" value="cod" wire:model="payment_method">
                                        </div>
                                    </div>
                                </div>
                                </label>
                            </li>
                            <li>
                                <label class="d-flex align-items-start p-2 bg-white">
                                    <div class="ml-2 flex-grow-1">
                                        <div class="d-flex align-items-center mb-1">
                                            <img src="{{ asset('assets/images/wallet.svg') }}" class="h-5 w-5 mr-1 mb-2">
                                            <span class="h6 font-weight-medium text-dark">E-Wallet Payment via Paymongo</span>
                                            <div class="form-check ml-auto">
                                                <input class="form-check-input" type="radio" name="payment_method" value="paymongo" wire:model="payment_method">
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
                            <span class="text-xs text-gray-500" style="margin-left: 29px;">Payment should be completed within 30 minutes.</span>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <div class="ml-2 text-sm text-gray-900">
                            <div class="flex items-center">
                            <img src="{{ asset('assets/images/maya.svg') }}"
                            class="h-5 w-5 mr-2">
                                <span>PayMaya</span>
                            </div>
                            <span class="text-xs text-gray-500" style="margin-left: 29px;">Payment should be completed within 30 minutes.</span>
                        </div>
                    </li>
                </ul>
                                    </div>
                                </label>
                            </li>
                        </ul>
                        @error('payment_method')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class=" bg-white border rounded-1 shadow-sm border-0 shadow-sm -ml-5">
                    <div class="card-body p-4 mr-3 ml-3">
                        <h5 class="text-xl text-center font-bold  text-gray-700 dark:text-gray mb-2">
                            ORDER SUMMARY
                        </h5>
                        <div class="flex justify-between mt-3">
                            <span>Subtotal</span>
                            <span>{{ Number::currency($grand_total - $shipping_amount, 'PHP') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping Cost</span>
                            <span>{{ Number::currency($shipping_amount, 'PHP') }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between  mb-2 font-bold pt-3" style="color: rgb(58, 58, 58);">
                            <span >Grand Total</span>
                            <span>{{ Number::currency($grand_total, 'PHP') }}</span>
                        </div>
                        <button type="submit"
                        class="bg-[#00DCE3] mt-4 w-full p-2 rounded-lg text-xl font-bold text-white hover:bg-[#00CFD6]">
                        Place Order
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Address Modal -->
    @if ($showAddressModal)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl  z-50">
                <div class="modal-header border-bottom pb-2">
                    <h4 class="modal-title">{{ $is_editing ? 'Edit Address' : 'Add your deliver address.' }}</h4>
                    <button type="button" class="btn-close" wire:click="closeAddressModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveAddress">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input wire:model="first_name" id="first_name" class="form-control" type="text">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input wire:model="last_name" id="last_name" class="form-control" type="text">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="street_address" class="form-label">Street Address</label>
                            <input wire:model="street_address" id="street_address" class="form-control" type="text">
                            @error('street_address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-3">
                            <label for="city" class="form-label">City</label>
                            <input wire:model="city" id="city" class="form-control" type="text">
                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="province" class="form-label">Province</label>
                                <input wire:model="province" id="province" class="form-control" type="text">
                                @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="zip_code" class="form-label">ZIP Code</label>
                                <input wire:model="zip_code" id="zip_code" class="form-control" type="text">
                                @error('zip_code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input wire:model="phone" id="phone" class="form-control" type="text">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="btn  btn-outline-success ">{{ $is_editing ? 'Save Changes' : 'Add Address' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="fixed inset-0 bg-black opacity-50 z-40"></div>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
</div>