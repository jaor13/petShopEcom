<x-filament-panels::page>
    <!-- <div class="bg-gray-100 min-h-screen py-8"> -->
    <div class="bg-gray-100 min-h-screen py-8 flex flex-col">

        <div class="bg-white shadow-lg rounded-lg p-10 max-w-4xl mx-auto">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-gray-100 rounded-t-lg p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-extrabold text-gray-700">Invoice Number:#12345</h1>
                        <p class="text-gray-400">Date: March 3, 2025</p>
                    </div>
                    <div class="text-right">
                    <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Company Logo" class="w-30 h-30" style="width: 120px; height: 120px;">
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t-4 border-gray-600 w-full"></div>

            <!-- Billing and Payment Information -->
            <div class="mt-0 grid grid-cols-2 gap-1">
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="font-bold text-blue-800 text-lg">Delivery Details</h2>
                    <p class="text-gray-700">Customer Name</p>
                    <p class="text-gray-700">Customer Address</p>
                    <p class="text-gray-700">Email: customer@example.com</p>
                    <p class="text-gray-700">Phone: (123) 456-7890</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="font-bold text-blue-800 text-lg">Payment Details</h2>
                    <p class="text-gray-700">Method: Credit Card</p>
                    <p class="text-gray-700">Status: Paid</p>
                    <p class="text-gray-700">Transaction ID: 987654321</p>
                </div>
            </div>

            <!-- Invoice Items -->
            <div class="mt-8 p-6 bg-white shadow-md rounded-lg">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-4 text-left text-gray-800">Product/Service</th>
                            <th class="border border-gray-300 p-4 text-right text-gray-800">Quantity</th>
                            <th class="border border-gray-300 p-4 text-right text-gray-800">Unit Price</th>
                            <th class="border border-gray-300 p-4 text-right text-gray-800">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="border border-gray-300 p-4 text-gray-700">Product 1</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-700">1</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-700">₱100.00</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-700">₱100.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-100">
                            <td colspan="3" class="border border-gray-300 p-4 text-right font-bold text-gray-800">Subtotal</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-800">₱100.00</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td colspan="3" class="border border-gray-300 p-4 text-right font-bold text-gray-800">Shipping</td>
                            <td class="border border-gray-300 p-4 text-right text-gray-800">₱50.00</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td colspan="3" class="border border-gray-300 p-4 text-right font-bold text-gray-800">Grand Total</td>
                            <td class="border border-gray-300 p-4 text-right font-bold text-gray-800">₱150.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Footer -->
            <div class="mt-10  p-6 py-10 text-center text-gray-600 text-sm mb-4">
                <p>Thank you for purchasing!</p>
                <p class="mt-1">If you have any questions about this invoice, please contact us.</p>
                <p class="mt-2 font-bold">AriCuz Petshop | Email: aripetshop415@gmail.com | Phone: (123) 456-7890</p>
            </div>


        </div>
    </div>
</x-filament-panels::page>
