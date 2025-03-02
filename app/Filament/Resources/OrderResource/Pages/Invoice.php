<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\Page;
use App\Models\Order;

class Invoice extends Page
{
    protected static string $resource = OrderResource::class;


    protected static string $view = 'filament.resources.order-resource.pages.invoice';




 
}
