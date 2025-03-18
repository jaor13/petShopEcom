<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class InventoryTrackingWidget extends ChartWidget
{
    protected static ?string $heading = 'Low Stock Alert';

    protected function getData(): array
    {
        $lowStockThreshold = 50; // Define the threshold for low stock

        $inventoryData = DB::table('products')
            ->select('id', 'product_name', 'stock_quantity') // Select product ID, name, and stock level
            ->where('stock_quantity', '<=', $lowStockThreshold) // Only include products below threshold
            ->orderBy('stock_quantity', 'asc') // Sort by stock level (ascending)
            ->get();

        $labels = [];
        $values = [];
        $productNames = [];

        foreach ($inventoryData as $data) {
            $labels[] = "ID: " . $data->id; // Use product ID as labels
            $values[] = $data->stock_quantity; // Stock levels as values
            $productNames[] = $data->product_name; // Store product names for tooltips
        }

        return [
            'datasets' => [
                [
                    'label' => 'Low Stock Products',
                    'data' => $values,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.6)', // Light red bars
                    'borderColor' => 'rgba(255, 99, 132, 1)', // Red border
                    'borderWidth' => 1,
                    'productNames' => $productNames, // Add product names as metadata
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bar chart for inventory visualization
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'tooltip' => [
                    'enabled' => true,
                    'callbacks' => [
                        'label' => 'function(tooltipItem) {
                            let index = tooltipItem.dataIndex; 
                            let productNames = tooltipItem.dataset.productNames || []; 
                            let productName = productNames[index] || "Unknown"; 
                            return productName + ": " + tooltipItem.raw + " units left";
                        }',
                    ],
                ],
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Product IDs',
                    ],
                ],
                'y' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Stock Levels',
                    ],
                    'ticks' => [
                        'beginAtZero' => true,
                    ],
                ],
            ],
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeOutQuart',
            ],
        ];
    }
    

}
