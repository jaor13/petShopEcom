<div class="container py-5">
    <h1 class="h2 font-weight-bold text-dark mb-4">
        Checkout
    </h1>
    <form wire:submit.prevent="placeOrder">
        <div class="row">

            <div class="col-lg-8 mb-4">
                <div class="card custom-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="border p-4 mb-4 rounded-3 shadow-sm">
                            <!-- Check if the user has an address -->
                            @if (!$use_existing_address)
                                <!-- Add Address Button -->
                                <button type="button" class="btn " wire:click="openAddressModal">
                                    <i class="fas fa-plus-circle mr-2"></i> 
                                    Add Address
                                </button>
                            @else

                                <!-- Non-Editing View -->
                                @if (!$is_editing)
                                    <div class="d-flex align-items-center">
                                        <!-- Location Pin Icon -->
                                        <div class="text-primary flex-shrink-0">
                                            <i class="fa-solid fa-location-dot fa-lg"></i>
                                        </div>

                                        <!-- Address Details -->
                                        <div class="ml-3 flex-grow-1">
                                            <h5 class="font-semibold text-dark mb-1">
                                                {{ $first_name }} {{ $last_name }}
                                            </h5>
                                            <p class="text-muted small mb-0">
                                                (+63) {{ $phone }}
                                            </p>
                                            <p class="text-muted small mb-0">
                                                {{ $street_address }}, {{ $province }}
                                            </p>
                                        </div>

                                        <!-- Edit Icon -->
                                        <div class="ml-auto">
                                            <button type="button" class="btn btn-link text-primary p-0" wire:click="openAddressModal(true)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            Edit
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <div class="mt-4">
                            <h5 class="font-weight-bold text-dark mb-3">
                                Product Ordered
                            </h5>
                            <ul class="list-unstyled">
                                @foreach ($cart_items as $ci)
                                    <li class="py-3 border-bottom" wire:key="{{ $ci['product_id'] }}">
                                        <div class="d-flex align-items-center">
                                            <img alt="{{ $ci['name'] }}" class="img-fluid bg-[#E7FAFF] rounded-lg " style="width: 15%; height: 15%;" src="{{ url('storage', $ci['image']) }}">
                                            <div class="ml-4 flex-grow-1">
                                                <p class="h6 font-weight-medium text-dark mb-1">
                                                    {{ $ci['name'] }}
                                                </p>
                                                @if (!empty($ci['variant_name']))
                                                    <p class="text-muted small mb-1">
                                                        Variant: {{ $ci['variant_name'] }}
                                                    </p>
                                                @endif
                                                <div class="font-weight-semibold text-danger">
                                                    {{ Number::currency($ci['total_amount'], 'PHP') }}
                                                </div>
                                            </div>
                                            <p class="h6 text-muted mb-0">
                                                x{{ $ci['quantity'] }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-dark mb-3">
                            Payment Methods
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <label class="d-flex align-items-center p-2 bg-white border rounded cursor-pointer">
                                    <div class="ml-2 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/cod.svg') }}" class="mr-2" style="height: 1.25rem;">
                                        <span class="h6 font-weight-medium text-dark">Cash on Delivery</span>
                                        <div class="form-check ml-auto">
                                            <input class="form-check-input" type="radio" name="payment_method" value="cod" wire:model="payment_method">
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label class="d-flex align-items-start p-2 bg-white border rounded cursor-pointer">
                                    <div class="ml-2 flex-grow-1">
                                        <div class="d-flex align-items-center mb-1">
                                            <img src="{{ asset('assets/images/wallet.svg') }}" class="mr-2" style="height: 1.25rem;">
                                            <span class="h6 font-weight-medium text-dark">E-Wallet Payment</span>
                                            <div class="form-check ml-auto">
                                                <input class="form-check-input" type="radio" name="payment_method" value="paymongo" wire:model="payment_method">
                                            </div>
                                        </div>
                                        <ul class="list-unstyled ml-4 mt-3">
                                            <li class="d-flex align-items-center mb-2">
                                                <img src="{{ asset('assets/images/Gcash.svg') }}" class="mr-2" style="height: 1.25rem;">
                                                <span class="small text-dark">GCash</span>
                                                <span class="small text-muted ml-3">Payment should be completed within 30 minutes.</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <img src="{{ asset('assets/images/maya.svg') }}" class="mr-2" style="height: 1.25rem;">
                                                <span class="small text-dark">PayMaya</span>
                                                <span class="small text-muted ml-3">Payment should be completed within 30 minutes.</span>
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

                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-center text-dark mb-3">
                            ORDER SUMMARY
                        </h5>
                        <div class="d-flex justify-content-between font-weight-bold mb-3">
                            <span>Subtotal</span>
                            <span>{{ Number::currency($grand_total - $shipping_amount, 'PHP') }}</span>
                        </div>
                        <div class="d-flex justify-content-between font-weight-bold mb-3">
                            <span>Shipping Cost</span>
                            <span>{{ Number::currency($shipping_amount, 'PHP') }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold mb-3">
                            <span>Grand Total</span>
                            <span>{{ Number::currency($grand_total, 'PHP') }}</span>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">
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