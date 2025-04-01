<x-filament-panels::page>

    <!-- {{ $order }} -->
    <!-- <div class="bg-gray-100 min-h-screen py-8"> -->
    <div class="bg-gray-100 min-h-screen py-8 flex flex-col">
    <div class="bg-white shadow-lg rounded-lg p-10 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-gray-100 rounded-t-lg p-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-extrabold white-700">Invoice for Order: #{{ $order->id }}</h1>
                    <p class="text-white-400">Date Ordered: {{ $order->created_at->format('F j, Y') }}</p>
                </div>
                <div class="text-right">
                    <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Company Logo" class="w-30 h-30" style="width: 120px; height: 120px;">
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t-4 border-gray-600 w-full mb-5"></div>

        <!-- Billing and Payment Information -->
        <div class="mt-5 grid grid-cols-2 gap-1">
            <!-- Delivery Details -->
            <div class="bg-blue-50 p-6 rounded-lg">
                <h2 class="font-bold text-blue-800 text-lg">Delivery Details</h2>
                <p class="text-gray-700">Recipient: {{ $order->user->address->full_name ?? 'N/A' }}</p>
                <p class="text-gray-700">Address: {{ $order->user->address->street_address ?? 'N/A' }}, {{ $order->user->address->city ?? '' }},{{ $order->user->address->zip_code ?? '' }} {{ $order->user->address->province ?? '' }} </p>
                <p class="text-gray-700">Email: {{ $order->user->email ?? 'N/A' }}</p>
                <p class="text-gray-700">Phone: {{ $order->user->address->phone ?? 'N/A' }}</p>
            </div>
            
            <!-- Payment Details -->
            <div class="bg-blue-50 p-6 rounded-lg">
                <h2 class="font-bold text-blue-800 text-lg">Payment Details</h2>
                <p class="text-gray-700">Method: {{ $order->payment_method }}</p>
                <p class="text-gray-700">Status: {{ ucfirst($order->payment_status) }}</p>
                <p class="text-gray-700">Transaction ID: {{ $order->paymongo_reference ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Invoice Items -->
        <div class="mt-8 p-6 bg-white shadow-md rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-4 text-center text-gray-800">Product</th>
                        <th class="border border-gray-300 p-4 text-center text-gray-800">Variant</th> 
                        <th class="border border-gray-300 p-4 text-center text-gray-800">Quantity</th>
                        <th class="border border-gray-300 p-4 text-center text-gray-800">Unit Price</th>
                        <th class="border border-gray-300 p-4 text-center text-gray-800">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr class="bg-white">
                            <td class="border border-gray-300 p-4 text-gray-700">{{ $item->product->product_name }}</td>
                            <td class="border border-gray-300 p-4 text-gray-700">{{ $item->variant->name ?? 'N/A' }}</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-700">{{ $item->quantity }}</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-700">₱{{ number_format($item->product->price, 2) }}</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-700">₱{{ number_format($item->quantity * $item->product->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-100">
                        <td colspan="4" class="border border-gray-300 p-4 text-right font-bold text-gray-800">Subtotal</td>
                        <td class="border border-gray-300 p-4 text-right text-gray-800">₱{{ number_format($order->grand_total - $order->shipping_amount, 2) }}</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td colspan="4" class="border border-gray-300 p-4 text-right font-bold text-gray-800">Shipping</td>
                        <td class="border border-gray-300 p-4 text-right text-gray-800">₱{{ number_format($order->shipping_amount, 2) }}</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td colspan="4" class="border border-gray-300 p-4 text-right font-bold text-gray-800">Grand Total</td>
                        <td class="border border-gray-300 p-4 text-right font-bold text-gray-800">₱{{ number_format($order->grand_total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Footer -->
        <div class="mt-10 p-6 py-10 text-center text-gray-600 text-sm mb-4">
            <p>Thank you for purchasing!</p>
            <p class="mt-1">If you have any questions about this invoice, please contact us.</p>
            <p class="mt-2 font-bold">AriCuz Petshop | Email: aripetshop415@gmail.com | Phone: 0976-3251-232</p>
        </div>
    </div>
</div>
</x-filament-panels::page>
