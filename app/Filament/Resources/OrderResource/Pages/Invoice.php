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
        $this->order = Order::with(['items.product', 'items.variant', 'address'])->find($record);
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label('Print')
                ->icon('heroicon-o-printer')
                ->requiresConfirmation()
        ];
    }
    

    protected static string $view = 'filament.resources.order-resource.pages.invoice';




 
}
