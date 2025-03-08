<div class="container mt-5">
  <ul class="nav nav-tabs d-flex mb-4">
        <li class="nav-item flex-fill text-center">
            <a class="nav-link {{ $status === 'all' ? 'active' : '' }}" wire:click.prevent="filterOrders('all')" href="#">All Orders</a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="nav-link {{ $status === 'to_ship' ? 'active' : '' }}" wire:click.prevent="filterOrders('to_ship')" href="#">To Ship</a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="nav-link {{ $status === 'to_receive' ? 'active' : '' }}" wire:click.prevent="filterOrders('to_receive')" href="#">To Receive</a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="nav-link {{ $status === 'completed' ? 'active' : '' }}" wire:click.prevent="filterOrders('completed')" href="#">Completed</a>
        </li>
    </ul>

    <div class="w-100">
        @forelse ($filteredOrders as $order)
            <div class="p-3 mb-4 border border-light shadow-sm rounded bg-white">
                <div class="d-flex justify-content-between border-bottom pb-2 mb-3">
                    <div class="d-flex">
                        <p><strong>Order Number:<br></strong>{{ $order['id'] }}</p>
                    </div>
                    <div class="d-flex">
                        <p><strong>Date Ordered:<br></strong> {{ $order['date'] }}</p>                
                    </div>
                    <div class="text-end">
                        <a class="btn btn-link">{{ ucfirst(str_replace('_', ' ', $order['status'])) }}</a>
                        <a href="#" class="btn btn-link">Order Details ></a>
                    </div>
                </div>

                @foreach ($order['items'] as $item)
                    <div class="d-flex mb-3 align-items-center">
                        <img src="cat-litter.jpg" alt="Product Image" class="img-thumbnail" style="width: 100px;">
                        <div class="ms-3 flex-grow-1">
                            <p><strong>{{ $item['name'] }}</strong></p>
                            <p>Variation:</p>
                        </div>
                        <div class="text-end">
                            <p><strong>x {{ $item['qty'] }}</strong></p>
                            <p><strong>₱{{ number_format($item['price'] * $item['qty'], 2) }}</strong></p>
                        </div>
                    </div>
                @endforeach

                <div class="mt-3 text-end pt-3">
                    <p><strong>Total Items: {{ count($order['items']) }}</strong></p>
                    <p><strong>Total Price: ₱{{ number_format($order['total_price'], 2) }}</strong></p>
                    <p class="text-info border border-secondary-subtle p-2 rounded d-inline-block" style="width: auto; max-width: 300px;">
                        <strong>{{ $order['message'] }}</strong>
                    </p>
                </div>
            </div>
        @empty
            <p class="text-center mt-4">No orders found.</p>
        @endforelse
    </div>
</div>
