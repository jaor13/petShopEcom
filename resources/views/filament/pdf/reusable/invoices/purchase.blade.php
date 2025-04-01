<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/DejaVuSans.ttf') }}") format('truetype');
        }
        body {
            font-family: Helvetica, Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }
        .header {
            background-color: #3b82f6;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            font-family: Helvetica, Arial, sans-serif;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
        }
        .header img {
            width: 120px;
            height: 120px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #6b7280;
            font-family: Helvetica, Arial, sans-serif;
            padding: 0;
            margin: 0 auto;
            background-color: transparent;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer p.bold {
            font-weight: bold;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #d1d5db;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }
        .table th {
            background-color: #e5e7eb;
            color: #1f2937;
            font-weight: bold;
        }
        .table tfoot td {
            background-color: #f9fafb;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header" style="margin-bottom: 20px;"> <!-- Added margin-bottom -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1>Invoice for Order: #{{ $order->id }}</h1>
                    <p>Date Ordered: {{ $order->created_at->format('F j, Y') }}</p>
                </div>
                <div>
                <img src="{{ asset('assets/images/brand-logo.svg') }}" alt="Company Logo" style="width: 120px; height: 120px;">
                </div>
            </div>
        </div>

        <!-- Billing and Payment Information -->
        <div class="section">
            <table style="width: 100%; table-layout: fixed;">
                <tr>
                    <!-- Delivery Details -->
                    <td style="background-color: #eff6ff; padding: 15px; border-radius: 8px; vertical-align: top; margin-right: 10px;"> <!-- Added margin-right -->
                        <h2 style="font-size: 18px; color: #1d4ed8; margin-bottom: 10px;">Delivery Details</h2>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Recipient: {{ $order->user->address->full_name ?? 'N/A' }}</p>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Address: {{ $order->user->address->street_address ?? 'N/A' }}, {{ $order->user->address->city ?? '' }}, {{ $order->user->address->zip_code ?? '' }} {{ $order->user->address->province ?? '' }}</p>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Email: {{ $order->user->email ?? 'N/A' }}</p>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Phone: {{ $order->user->address->phone ?? 'N/A' }}</p>
                    </td>

                    <!-- Payment Details -->
                    <td style="background-color: #eff6ff; padding: 15px; border-radius: 8px; vertical-align: top; margin-left: 10px;"> <!-- Added margin-left -->
                        <h2 style="font-size: 18px; color: #1d4ed8; margin-bottom: 10px;">Payment Details</h2>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Method: {{ $order->payment_method }}</p>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Status: {{ ucfirst($order->payment_status) }}</p>
                        <p style="font-size: 14px; color: #374151; margin: 5px 0;">Transaction ID: {{ $order->paymongo_reference ?? 'N/A' }}</p>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Orders Table -->
        <div class="section">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Variant</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td style="text-align: left";>{{ $item->product->product_name }}</td>
                            <td>{{ $item->variant->name ?? 'N/A' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->product->price, 2) }}</td>
                            <td>{{ number_format($item->quantity * $item->product->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Subtotal</td>
                        <td style="text-align: center;">{{ number_format($order->grand_total - $order->shipping_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Shipping</td>
                        <td style="text-align: center;">{{ number_format($order->shipping_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Grand Total</td>
                        <td style="text-align: center; font-weight: bold;">{{ number_format($order->grand_total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for purchasing!</p>
            <p>If you have any questions about this invoice, please contact us.</p>
            <p class="bold">AriCuz Petshop | Email: aripetshop415@gmail.com | Phone: 0976-3251-232</p>
        </div>
    </div>
</body>
</html>
