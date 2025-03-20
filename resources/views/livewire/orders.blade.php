<div class="container mt-5">
<ul class="d-flex mb-4 bg-light p-0">
    <li class="nav-item flex-fill text-center mx-4" style="width: 150.61px;"> <a class="nav-link fw-bold py-2 {{ $status === 'all' ? 'active text-info border-bottom border-3 border-info' : 'text-secondary' }}"
            wire:click.prevent="filterOrders('all')" href="#">All Orders</a>
    </li>
    <li class="nav-item flex-fill text-center mx-4" style="width: 150.61px;"> <a class="nav-link fw-bold py-2 {{ $status === 'to_ship' ? 'active text-info border-bottom border-3 border-info' : 'text-secondary' }}"
            wire:click.prevent="filterOrders('to_ship')" href="#">To Ship</a>
    </li>
    <li class="nav-item flex-fill text-center mx-4" style="width: 150.61px;"> <a class="nav-link fw-bold py-2 {{ $status === 'to_receive' ? 'active text-info border-bottom border-3 border-info ' : 'text-secondary' }}"
            wire:click.prevent="filterOrders('to_receive')" href="#">To Receive</a>
    </li>
    <li class="nav-item flex-fill text-center mx-4" style="width: 150.61px;"> <a class="nav-link fw-bold py-2 {{ $status === 'completed' ? 'active text-info border-bottom border-3 border-info' : 'text-secondary' }}"
            wire:click.prevent="filterOrders('completed')" href="#">Completed</a>
    </li>
</ul>

<div class="w-100 p-0">
        @forelse ($filteredOrders as $order)
            <div class="px-5 py-3 border rounded bg-white mb-2">
               <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
    <div>
        <p class="text-secondary mb-1">Order Number:</p>
        <p class="font-bold  text-gray-700 dark:text-black">{{ $order['id'] }}</p>
    </div>
    <div>
        <p class="text-secondary mb-1">Date Ordered:</p>
        <p class="font-bold  text-gray-700 dark:text-black">{{ $order['date'] }}</p>
    </div>
    <div>
        <p class="mb-1">
            <span class="text-info">{{ ucfirst(str_replace('_', ' ', $order['status'])) }}</span>
        </p>
    </div>
                    <div>
                    <a href="#" class="btn btn-link  text-secondary text-decoration-none " wire:click.prevent="selectOrder({{ $order['id'] }})">Order Details ></a>
                    </div>
                </div>

                @foreach ($order['items'] as $item)
                <div class="d-flex  align-items-center mb-2">
                    <div class="border rounded p-1">
                    <img src="{{ $item['image'] ? url('storage', $item['image']) : '' }}" alt="Product Image" class="img-thumbnail rounded-lg" style="width: 100px; background-color: #E7FAFF; border: none;">
                    </div>
                    <div class="ms-3 flex-grow-1">
                        <p><strong>{{ $item['name'] }}</strong></p>
                        <p>Variation: {{ $item['variant_name'] ?? 'N/A' }}</p>
                    </div>
                    <div class="text-end">
                        <p><strong>x {{ $item['qty'] }}</strong></p>
                        <p><strong>₱{{ number_format($item['price'] * $item['qty'], 2) }}</strong></p>
                    </div>
                </div>
                @endforeach

                <div class=" text-end mb-4">
                    <p class="mb-0"><strong>Total Items: {{ count($order['items']) }}</strong></p>
                    <p><strong>Total Price: ₱{{ number_format($order['total_price'], 2) }}</strong></p>
                    <div class="d-inline-block">
            <p class="mb-0 rounded-2 px-3 py-2" 
               style="border: 2px solid #00DCE3; color: #00DCE3; background-color: #f8f9fa; font-weight: bold;">
                {{ $order['message'] }}
            </p>
        </div>
                </div>
            </div>
        @empty
            <p class="text-center mt-4">No orders found.</p>
        @endforelse
    </div>
</div>
