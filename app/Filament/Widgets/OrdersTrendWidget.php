<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersTrendWidget extends ChartWidget
{
    protected static ?string $heading = 'Orders Trend';

    protected function getData(): array
    {
        // Get the toggle input (e.g., "daily", "weekly", "monthly")
        $timeFrame = request()->get('timeFrame', 'daily'); // Default to "daily"

        $query = DB::table('orders')
            ->selectRaw('COUNT(*) as orders_count');

        switch ($timeFrame) {
            case 'weekly':
                $query->selectRaw('YEARWEEK(created_at) as order_period')
                    ->groupBy('order_period')
                    ->orderBy('order_period');
                break;

            case 'monthly':
                $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as order_period')
                    ->groupBy('order_period')
                    ->orderBy('order_period');
                break;

            case 'daily':
            default:
                $query->selectRaw('DATE(created_at) as order_period')
                    ->groupBy('order_period')
                    ->orderBy('order_period');
                break;
        }

        $query->where('created_at', '>=', Carbon::now()->subDays(30)); // Last 30 days

        $ordersData = $query->get();

        $labels = [];
        $values = [];

        foreach ($ordersData as $data) {
            $labels[] = $data->order_period;
            $values[] = $data->orders_count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Orders',
                    'data' => $values,
                    'borderColor' => '#36A2EB', // Blue line
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Light blue fill
                    'pointBorderColor' => '#36A2EB',
                    'pointBackgroundColor' => '#fff',
                    'pointHoverBackgroundColor' => '#36A2EB',
                    'pointHoverBorderColor' => '#fff',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'tooltip' => [
                    'enabled' => true,
                ],
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeOutQuart',
            ],
        ];
    }
}
