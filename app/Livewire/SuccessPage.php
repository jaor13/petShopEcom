<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class SuccessPage extends Component
{
    public $order;

    public function mount($order_id)
    {
        $this->order = Order::findOrFail($order_id);
    }

    public function render()
    {
        return view('livewire.success-page', ['order' => $this->order]);
    }
}
