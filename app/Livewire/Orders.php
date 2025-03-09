<?php

namespace App\Livewire;

use Livewire\Component;

class Orders extends Component
{
    public $status = 'all'; // Default tab
    public $orders = [];

    public function mount()
    {
        $this->fetchOrders();
    }

    public function fetchOrders()
    {
        // Sample order data (replace with DB query)
        $this->orders = [
            [
                'id' => 'O-12345678914',
                'date' => 'February 14, 2025, 11:10',
                'status' => 'to_ship',
                'items' => [
                    ['name' => 'Tofu Fragrance Free Cat Litter 6L', 'qty' => 1, 'price' => 469.00],
                    ['name' => 'Tofu Fragrance Free Cat Litter 6L', 'qty' => 2, 'price' => 469.00],
                ],
                'total_price' => 986.00,
                'message' => 'Aricuz is preparing your order'
            ],
            [
                'id' => 'O-98765432100',
                'date' => 'March 3, 2025, 14:00',
                'status' => 'completed',
                'items' => [
                    ['name' => 'Premium Cat Food', 'qty' => 1, 'price' => 799.00],
                ],
                'total_price' => 799.00,
                'message' => 'Order completed successfully'
            ]
        ];
    }

    public function filterOrders($status)
    {
        $this->status = $status;
    }

    public function getFilteredOrders()
    {
        if ($this->status === 'all') {
            return $this->orders;
        }

        return array_filter($this->orders, fn ($order) => $order['status'] === $this->status);
    }

    public function render()
    {
        return view('livewire.orders', [
            'filteredOrders' => $this->getFilteredOrders(),
        ]);
    }
}
