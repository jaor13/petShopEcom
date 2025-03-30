<div class="container -mt-4 ">
    
    <ul class="d-flex mb-1 -ml-3 bg-white h-10 p-9 pt-3 p-10 gap-8 ">
        <li class="nav-item flex-fill text-center text-lg">
            <a class="custom-link py-2 {{ $status === 'all' ? 'active' : '' }}" 
            wire:click.prevent="filterOrders('all')" href="?status=all" style="font-weight: normal;">
                All Orders
            </a>
        </li>
        <li class="nav-item flex-fill text-center text-lg">
            <a class="custom-link py-2 {{ $status === 'to_ship' ? 'active' : '' }}" 
            wire:click.prevent="filterOrders('to_ship')" href="?status=to_ship" style="font-weight: normal;">
             To Ship
            </a>
        </li>
        <li class="nav-item flex-fill text-center text-lg">
            <a class="custom-link py-2 {{ $status === 'to_receive' ? 'active' : '' }}" 
            wire:click.prevent="filterOrders('to_receive')" href="?status=to_receive" style="font-weight: normal;">
              To Receive
            </a>
        </li>
        <li class="nav-item flex-fill text-center text-lg">
            <a class="custom-link py-2 {{ $status === 'delivered' ? 'active' : '' }}" 
            wire:click.prevent="filterOrders('delivered')" href="?status=delivered" style="font-weight: normal;">
                Delivered
            </a>
        </li>
        <li class="nav-item flex-fill text-center text-lg">
            <a class="custom-link py-2 {{ $status === 'completed' ? 'active' : '' }}" 
            wire:click.prevent="filterOrders('completed')" href="?status=completed" style="font-weight: normal;">
                Completed
            </a>
        </li>
        <li class="nav-item flex-fill text-center text-lg">
            <a class="custom-link py-2 {{ $status === 'cancelled' ? 'active' : '' }}" 
            wire:click.prevent="filterOrders('cancelled')" href="?status=cancelled" style="font-weight: normal;">
                 Cancelled
            </a>
        </li>
    </ul>

        <div class="w-120 p-0 -ml-3">
            @if ($selectedOrderId)
                @livewire('order-details', ['order' => collect($orders)->firstWhere('id', $selectedOrderId)])
            @else
                @forelse ($filteredOrders as $order)
                    <div class="px-5 py-3 shadow-sm  mb-2 bg-white">
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
                                    <span class="font-semibold text-[#00DCE3]">{{ ucfirst(str_replace('_', ' ', $order['status'])) }}</span>
                                </p>
                            </div>
                            <div class="">
                                <a href="#" class="btn btn-link text-secondary text-decoration-none mt-3" wire:click.prevent="selectOrder({{ $order['id'] }})">Order Details ></a>
                            </div>
                        </div>

                        @foreach ($order['items'] as $item)
                            <div class="d-flex align-items-center mb-2">
                                <div class="border  rounded p-1">
                                    <img src="{{ $item['image'] ? url('storage', $item['image']) : '' }}" alt="Product Image" class="img-thumbnail rounded-lg" style="width: 100px; background-color: #E7FAFF; border: none;">
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <p style ="color: #4F4F4F;"><strong>{{ $item['name'] }}</strong></p>
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
                                @if ($order['status'] === 'delivered')
                                <button class="btn btn-success" onclick="openModal('testModal', {{ $order['id'] }})">
                                    Order Received
                                </button>
                                @else
                                    <p class="mb-0 rounded-3 px-3 py-2" style="border: 2px solid #00DCE3; color: #00DCE3; background-color:hsl(0, 0.00%, 100.00%); font-weight: bold;">
                                        {{ $order['message'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center mt-4">No orders found.</p>
                @endforelse
            @endif
        </div>


        <div id="testModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="flex justify-between items-center p-4 border-b">
                <h5 class="text-xl font-medium" id="testModalLabel">Order Received Confirmation</h5>
                <button type="button" class="text-gray-400 hover:text-gray-600" onclick="toggleModal('testModal')">
                    <span class="sr-only">Close</span>
                    &times;
                </button>
            </div>
            <div class="p-4">
                Are you sure you want to mark this order as received?
                <input type="hidden" id="orderId" value="">
            </div>
            <div class="flex justify-end p-4 border-t">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="toggleModal('testModal')">Cancel</button>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="updateOrderStatus(document.getElementById('orderId').value)">Confirm</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalID, orderId) {
            document.getElementById('orderId').value = orderId;
            toggleModal(modalID);
        }

        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
        }
    </script>

</div>
