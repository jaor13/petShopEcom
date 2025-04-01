<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\Page;
use App\Models\Order;
use Filament\Pages\Actions\Action;

class Invoice extends Page
{
    protected static string $resource = OrderResource::class;


    public $record;
    public $order;

    public function mount($record)
    {
        $this->record = $record;
        $this->order = Order::with(['items.product', 'items.variant', 'user.address'])->find($record);
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label('Print')
                ->icon('heroicon-o-printer')
                ->requiresConfirmation()
                ->url(route('print-invoice',['id' => $this->record])), 

           Action::make('download')
                ->label('Download PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->url(route('download-invoice',['id' => $this->record]))
                ->openUrlInNewTab(), // Optional: Opens the PDF in a new tab
        ];
    }
    

    protected static string $view = 'filament.resources.order-resource.pages.invoice';




 
}
