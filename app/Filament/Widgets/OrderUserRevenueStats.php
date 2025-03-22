<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;

class OrderUserRevenueStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            // Total Orders
            Card::make('Total Orders', Order::where('status', 'completed')->count())
                ->description('Completed Orders')
                ->icon('heroicon-o-shopping-cart'),

            // Total Users
            Card::make('Total Users', User::count())
                ->description('Registered Users')
                ->icon('heroicon-o-user'),

            // Total Revenue
            Card::make('Total Revenue', '₱' . number_format(Order::where('status', 'completed')
                ->where('payment_status', 'paid')
                ->sum('grand_total'), 2))
                ->description('Total Sales')
                ->icon('heroicon-o-banknotes'),
        ];
    }
}
