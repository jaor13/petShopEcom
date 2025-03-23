<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FilaWidget extends ChartWidget
{
    protected static ?string $heading = 'Revenue Trend (Last 30 Days)';

    protected function getData(): array
    {
        $revenueData = DB::table('orders')
            ->selectRaw('SUM(grand_total) as revenue, DATE(created_at) as order_date')
            ->where('status', 'completed')
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subDays(30)) // Last 30 days
            ->groupBy('order_date')
            ->orderBy('order_date')
            ->get();

        $labels = [];
        $values = [];

        foreach ($revenueData as $data) {
            $labels[] = Carbon::parse($data->order_date)->format('M d'); // Format dates
            $values[] = round($data->revenue, 2); // Ensure two decimal places
        }

        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $values,
                    'borderColor' => '#4285F4', // Blue line
                    'backgroundColor' => 'rgba(66, 133, 244, 0.2)', // Transparent blue fill
                    'pointBorderColor' => '#4285F4',
                    'pointBackgroundColor' => '#fff',
                    'pointHoverBackgroundColor' => '#4285F4',
                    'pointHoverBorderColor' => '#fff',
                    'fill' => true, // Enable fill beneath the line
                    'tension' => 0.4, // Smooth curves
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
                    'position' => 'bottom', // Positioning legend at the bottom
                ],
            ],
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeOutQuart',
            ],
        ];
    }
}
