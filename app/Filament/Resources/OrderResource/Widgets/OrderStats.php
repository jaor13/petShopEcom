<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;

class OrderStats extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::query()->where('status', 'new')->count())
                ->icon('heroicon-o-document-text'),
            Stat::make('Order Processing', Order::query()->where('status', 'processing')->count())
                ->icon('heroicon-o-clock'),
            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count())
                ->icon('heroicon-o-check-circle'),
            Stat::make('Average Price', '₱ ' . number_format(Order::query()->avg('grand_total'), 2))
                ->icon('heroicon-o-currency-dollar'),
        ];
    }
}
