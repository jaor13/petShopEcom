<?php

namespace App\Livewire\Partials;

use App\Models\Product;
use Livewire\Component;

class ProductGrid extends Component
{
    public $query;
    public $category;

    public function mount($query = null, $category = null)
    {
        $this->query = $query;
        $this->category = $category;
    }

    public function render()
    {
        $products = Product::where('is_active', 1);

        if ($this->category) {
            $products->whereHas('category', function ($q) {
                $q->where('name', 'like', '%' . $this->category . '%');
            });
        }

        if ($this->query) {
            $products->where('product_name', 'like', '%' . $this->query . '%');
        }

        return view('livewire.partials.product-grid', [
            'products' => $products->get()
        ]);
    }
}
