<div class="container mt-5">
<ul class="nav nav-tabs d-flex mb-4 bg-light ">
    <li class="nav-item flex-fill text-center">
        <a class="nav-link fw-bold py-2 {{ $status === 'all' ? 'active text-info border' : 'text-secondary' }}"
           wire:click.prevent="filterOrders('all')" href="#" >All Orders</a>
    </li>
    <li class="nav-item flex-fill text-center">
        <a class="nav-link fw-bold py-2 {{ $status === 'to_ship' ? 'active text-info ' : 'text-secondary' }}"
           wire:click.prevent="filterOrders('to_ship')" href="#">To Ship</a>
    </li>
    <li class="nav-item flex-fill text-center">
        <a class="nav-link fw-bold py-2 {{ $status === 'to_receive' ? 'active text-info ' : 'text-secondary' }}"
           wire:click.prevent="filterOrders('to_receive')" href="#">To Receive</a>
    </li>
    <li class="nav-item flex-fill text-center">
        <a class="nav-link fw-bold py- {{ $status === 'completed' ? 'active text-info ' : 'text-secondary' }}"
           wire:click.prevent="filterOrders('completed')" href="#">Completed</a>
    </li>
    
</ul>



<div class="w-100 p-0">
        @forelse ($filteredOrders as $order)
            <div class="p-4 mb-3 border rounded bg-white">
               <div class="d-flex justify-content-between align-items-center">
    <div>
        <p class="text-secondary mb-1">Order Number:</p>
        <p class="mb-0">0-O-{{ $order['id'] }}</p>
    </div>
    <div>
        <p class="text-secondary mb-1">Date Ordered:</p>
        <p class="mb-0">{{ $order['date'] }}</p>
    </div>
    <div>
        <p class="mb-1">
            <span class="text-info">{{ ucfirst(str_replace('_', ' ', $order['status'])) }}</span>
        </p>
    </div>
    <div>
        <a href="#" class="text-secondary text-decoration-none">Order Details ></a>
    </div>
</div>

                <hr style="margin-top: 5px; border: 0.6px solid #ccc;">
                </hr>
                @foreach ($order['items'] as $item)
                    <div class="row mb-3 align-items-center">
                        <div class="col-2">
                            <div class="border rounded p-2" style="width: 100px; height: 100px;">
                                <img src="{{ asset('images/cat-litter.jpg') }}" alt="Product Image" class="w-100 h-100" style="object-fit: contain;">
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-1">{{ $item['name'] }}</h6>
                            <p class="text-secondary mb-0">Variation</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="mb-1">x{{ $item['qty'] }}</p>
                            <p class="mb-0"><strong>₱{{ number_format($item['price'], 2) }}</strong></p>
                        </div>
                    </div>
                @endforeach

                <div class="text-end">
    <p class="mb-3">Total Items: <strong>₱{{ number_format($order['total_price'], 2) }}</strong></p>
    @if($order['message'])
        <div class="d-inline-block">
            <p class="mb-0 rounded-2 px-3 py-2" 
               style="border: 2px solid #00DCE3; color: #00DCE3; background-color: #f8f9fa; font-weight: bold;">
                {{ $order['message'] }}
            </p>
        </div>
    @endif
</div>



            </div>
        @empty
            <p class="text-center mt-4">No orders found.</p>
        @endforelse
    </div>