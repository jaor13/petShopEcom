<?php

namespace App\Http\Controllers;

use App\Models\InvoiceRecord;
use Barryvdh\DomPDF\Pdf;
use Illuminate\Http\Request;
use App\Models\Order;
use Filament\Notifications\Notification;


class InvoiceController extends Controller
{
    /**
     * Show the invoice for the given order.
     *
     * @param $id
     */
    public function printPurchaseInvoice($id)
    {
        $order = Order::with(['items.product', 'items.variant', 'user.address'])->find($id);
        if($order){
            InvoiceRecord::create([
                'user_id' => auth()->user()->id,
                'order_id' => $id,
            ]);
            $pdf = \PDF::loadView('filament.pdf.purchase_invoice',compact('order'))
            ->setPaper('a4')
            ->setOptions(['defaultFont' => 'Helvetica'])
            ->setOption('encoding', 'UTF-8');
            
            return $pdf->stream();
        }
        else{;
            Notification::make()
                ->title('No order record found')
                ->danger()
                ->send();
            return redirect()->back();
        }
    }

    /**
     * Download the invoice for the given order.
     *
     * @param $id
     */
    public function downloadPurchaseInvoice($id)
    {
        $order = Order::with(['items.product', 'items.variant', 'user.address'])->find($id);
        if ($order) {
            InvoiceRecord::create([
                'user_id' => auth()->user()->id,
                'order_id' => $id,
            ]);

            // Generate the PDF
            $pdf = \PDF::loadView('filament.pdf.purchase_invoice', compact('order'))
                ->setPaper('a4')
                ->setOptions(['defaultFont' => 'Helvetica'])
                ->setOption('encoding', 'UTF-8');

            // Return the PDF as a download
            return $pdf->download('invoice-' . $order->id . '.pdf');
        } else {
            Notification::make()
                ->title('No order record found')
                ->danger()
                ->send();
            return redirect()->back();
        }
    }
}
