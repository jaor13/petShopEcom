<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Http\Request;

#[Title("Products - Aricuz")]
class ProductsPage extends Component
{

    public $type;

    public $limit;

    public function mount(Request $request, $limit = null,)
    {
        $this->type = $request->query('type');
        $this->limit = $limit;
    }

    public function updated()
    {
        $this->resetPage(); 
    }
    


    public function render()
    {
        $products = Product::query()->where('is_active', 1);

        if ($this->type === 'latest') {
            $products->orderBy('created_at', 'desc');
        } elseif ($this->type === 'best_sellers') {
            $products->orderBy('sold_count', 'desc');
        }

        if ($this->limit) {
            $products->limit($this->limit);
        }

        return view('livewire.products-page', [
            'products' => $products->get(),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
            'type' => $this->type,
        ]);
    }
}
