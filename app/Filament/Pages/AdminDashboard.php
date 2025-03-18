<?php

namespace App\Filament\Pages;

use App;
use Filament\Pages\Page;
use App\Filament\Widgets\LatestOrders; // Import your widget

class AdminDashboard extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationIcon = 'heroicon-o-fire';


    protected static ?string $title = 'Dashboard';

    protected static ?string $slug = 'admin-dashboard'; // Ensure your route matches

    protected static string $view = 'filament.pages.admin-dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            App\Filament\Widgets\OrderUserRevenueStats::class,
            App\Filament\Widgets\FilaWidget::class,
            App\Filament\Widgets\OrdersTrendWidget::class,
            App\Filament\Widgets\InventoryTrackingWidget::class,
            App\Filament\Widgets\LatestOrders::class,
        ];
    }

}
