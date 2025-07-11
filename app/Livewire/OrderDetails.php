<?php

namespace App\Livewire;

use Livewire\Component;
use Log;

class OrderDetails extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = $order;
    }

    public function goBack()
    {
        $this->emit('sectionChanged', ['section' => 'orders']);
    }

    public function render()
    {
        return view('livewire.order-details', ['order' => $this->order]);
    }
}