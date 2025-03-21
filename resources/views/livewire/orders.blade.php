<div class="container mt-4 p-0">
    <ul class="d-flex mb-4 p-0">
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $status === 'all' ? 'active' : '' }}" 
               wire:click.prevent="filterOrders('all')" href="?status=all">
                <i class="fas fa-list-alt me-2"></i> All Orders
            </a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $status === 'to_ship' ? 'active' : '' }}" 
               wire:click.prevent="filterOrders('to_ship')" href="?status=to_ship">
                <i class="fas fa-shipping-fast me-2"></i> To Ship
            </a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $status === 'to_receive' ? 'active' : '' }}" 
               wire:click.prevent="filterOrders('to_receive')" href="?status=to_receive">
                <i class="fas fa-box-open me-2"></i> To Receive
            </a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $status === 'completed' ? 'active' : '' }}" 
               wire:click.prevent="filterOrders('completed')" href="?status=completed">
                <i class="fas fa-check-circle me-2"></i> Completed
            </a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $status === 'cancelled' ? 'active' : '' }}" 
               wire:click.prevent="filterOrders('cancelled')" href="?status=cancelled">
               <i class="fas fa-times-circle me-2"></i> Cancelled
            </a>
        </li>
    </ul>

    <div class="w-100 p-0">
        @forelse ($filteredOrders as $order)
            <div class="px-5 py-3 shadow-sm rounded mb-2 custom-card-design">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <div>
                        <p class="text-secondary mb-1">Order Number:</p>
                        <p class="font-bold text-gray-600">{{ $order['id'] }}</p>
                    </div>
                    <div>
                        <p class="text-secondary mb-1">Date Ordered:</p>
                        <p class="font-bold text-gray-600">{{ $order['date'] }}</p>
                    </div>
                    <div>
                        <p class="mb-1 mt-3">
                            <span class="font-bold text-gray-600">{{ ucfirst(str_replace('_', ' ', $order['status'])) }}</span>
                        </p>
                    </div>
                    <div class="">
                        <a href="#" class="btn btn-link text-secondary text-decoration-none mb-5" wire:click.prevent="selectOrder({{ $order['id'] }})">Order Details ></a>
                    </div>
                </div>

                @foreach ($order['items'] as $item)
                    <div class="d-flex align-items-center mb-2">
                        <div class="border rounded p-1">
                            <img src="{{ $item['image'] ? url('storage', $item['image']) : '' }}" alt="Product Image" class="img-thumbnail rounded-lg" style="width: 100px; background-color: #E7FAFF; border: none;">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <p><strong>{{ $item['name'] }}</strong></p>
                            <p>Variation: {{ $item['variant_name'] ?? 'N/A' }}</p>
                        </div>
                        <div class="text-end">
                            <p>x {{ $item['qty'] }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="text-end mb-4">
                    <p class="mb-0">Total Items: {{ count($order['items']) }}</p>
                    <p><strong>Total Price: ₱{{ number_format($order['total_price'], 2) }}</strong></p>
                    <div class="d-inline-block">
                        <p class="mb-0 rounded-3 px-3 py-2" style="border: 2px solid #00DCE3; color: #00DCE3; background-color: #f8f9fa; font-weight: bold;">
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
