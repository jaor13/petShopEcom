<div>
    <div class="container mt-5 rounded-3">
    <div class="d-flex justify-content-between align-items-center ">
            <h4 class="text-white text-center pt-2 w-100 h-12 m-0" style="background-color: #00DCE3; 
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;">
                Your order is complete
            </h4>
        </div>

        <div class="px-4 py-3 mb-2 border bg-white" style=" 
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;">
            <h6 class="w-100 border-bottom pb-2">Delivery Information</h6>
            <div class="ms-4 d-flex align-items-center mt-3">
                <div class="text-primary flex-shrink-0 " style="margin-bottom: 35px;">
                    <i class="fa-solid fa-location-dot fa-lg " style="color: #ED2A2A;"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-1">{{ $order['user']['first_name'] }} {{ $order['user']['last_name'] }}</h6>
                    <p class="mb-1">{{ $order['user']['phone'] }}</p>
                    <p>{{ $order['user']['address']['street_address'] }}, {{ $order['user']['address']['city'] }}, {{ $order['user']['address']['province'] }}, {{ $order['user']['address']['zip_code'] }}</p>
                </div>
            </div>

            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left font-semibold">Items Summary</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: right;">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order['items'] as $item)
                        <tr>
                            <td>
                                <div class="d-flex items-center mb-3">
                                    <div class="border rounded p-1">
                                        <img src="{{ asset('storage/' . ltrim($item['image'], '/')) }}" alt="{{ $item['name'] }}" class="img-thumbnail rounded-lg" style="width: 100px; background-color: #E7FAFF; border: none;">
                                    </div>
                                    <div class="text-left ms-2">
                                        <p><strong>{{ $item['name'] }}</strong></p>
                                        <p>Variation: {{ $item['variant_name'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <p>x {{ $item['qty'] }}</p>
                            </td>
                            <td class="text-center">
                                <p>₱{{ number_format($item['price'], 2) }}</p>
                            </td>
                            <td class="text-right">
                                <p>₱{{ number_format($item['price'] * $item['qty'], 2) }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                <div class="d-flex justify-content-between pb-2">
                    <p class="mb-0">Subtotal:</p>
                    <p class="mb-0">₱{{ number_format(array_sum(array_column($order['items'], 'total')), 2) }}</p>
                </div>
                <div class="d-flex justify-content-between border-bottom pb-2">
                    <p class="mb-0">Delivery Fee:</p>
                    <p class="mb-0">₱{{ number_format($order['shipping_amount'], 2) }}</p>
                </div>
                <div class="text-end mt-3 mb-5">
                    <p class="mb-0"><strong>Order Total: ₱ {{ number_format($order['total_price'], 2) }}</strong></p>
                </div>
            </div>
        </div>

        <div class="px-4 py-3 border rounded bg-white">
            <div class="d-flex justify-content-between">
                <h5 class="mb-1"><strong>Order ID:</strong></h5>
                <p class="mb-1">#{{ $order['id'] }}</p>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <p class="mb-1">Payment Method:</p>
                <p class="mb-1">{{ $order['payment_method'] }}</p>
            </div>

            <div class="border-bottom mb-4 d-flex justify-content-between">
                <p class="mb-1">E-Invoice:</p>
                <p class="mb-1"><a href="#" class="text-decoration-none">View ></a></p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="mb-1">Order Time:</p>
                <p class="mb-1">{{ \Carbon\Carbon::parse($order['date'])->format('d-m-Y h:i A') }}</p>
            </div>
        </div>
    </div>
</div>