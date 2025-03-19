<div>
    <div class="container border border-light border-3 rounded-2 p-0">  
        <!-- Order Completion Header -->
        <div>
            <h4 class="text-white text-center w-100 m-0 rounded-2" style="background-color: #00DCE3;">
                Your order is complete
            </h4>
        </div>

        <!-- Delivery Information -->
        <div class="p-4 mb-2">
            <h6 class="w-100 border-bottom pb-2">Delivery Information</h6>
            <div class="ms-4 d-flex align-items-center mt-3">
                <i class="fa-solid fa-map-marker fa-2x" style="color: red; background-color: white; border-radius: 50%; padding: 5px;"></i>
                <div class="ms-5">
                    <h6 class="mb-1">{{ $order['user']['first_name'] }} {{ $order['user']['last_name'] }}</h6>
                    <p class="mb-1">{{ $order['user']['phone'] }}</p>
                    <p>{{ $order['user']['address']['street_address'] }}, {{ $order['user']['address']['city'] }}, {{ $order['user']['address']['province'] }}, {{ $order['user']['address']['zip_code'] }}</p>
                </div>
            </div>
        </div>

        <!-- Items Summary -->
        <div class="p-4 mb-2">
            <h6 class="w-100 border-bottom pb-2">Items Summary</h6>

            @foreach($order['items'] as $item)
            <div class="d-flex mb-3">
                <img src="{{ asset('storage/' . ltrim($item['image'], '/')) }}" alt="{{ $item['name'] }}" class="img-thumbnail" style="width: 100px;">
                <div class="ms-3 flex-grow-1">
                    <p><strong>{{ $item['name'] }}</strong></p>
                    <p><strong>Variant:</strong> {{ $item['variant_name'] }}</p>
                    <p><strong>Quantity:</strong> {{ $item['qty'] }}</p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0"><strong>Price:</strong> ₱{{ number_format($item['price'], 2) }} each</p>
                        <p class="mb-0"><strong>Total Price:</strong> ₱{{ number_format($item['total'], 2) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Payment Summary -->
        <div class="p-4">
            <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                <p class="mb-0"><strong>Subtotal:</strong></p>
                <p class="mb-0">₱{{ number_format(array_sum(array_column($order['items'], 'total')), 2) }}</p>
            </div>
            <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                <p class="mb-0"><strong>Delivery Fee:</strong></p>
                <p class="mb-0">₱{{ number_format($order['shipping_amount'], 2) }}</p>
            </div>
            <div class="text-end mt-3">
                <p class="mb-0"><strong>Order Total:</strong> ₱{{ number_format($order['total_price'], 2) }}</p>
            </div>
        </div>

        <!-- Order Details -->
        <div class="p-4">
            <div class="d-flex justify-content-between">
                <h5 class="mb-1"><strong>Order ID:</strong></h5>
                <p class="mb-1">#{{ $order['id'] }}</p>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <p class="mb-1">Paid Method:</p>
                <p class="mb-1">{{ $order['payment_method'] }}</p>
            </div>

            <div class="border-bottom mb-4 d-flex justify-content-between">
                <p class="mb-1">E-Invoice:</p>
                <p class="mb-1"><a href="#">View</a></p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="mb-1">Order Time:</p>
                <p class="mb-1">{{ \Carbon\Carbon::parse($order['date'])->format('d-m-Y h:i A') }}</p>
            </div>
        </div>
    </div>
</div>
