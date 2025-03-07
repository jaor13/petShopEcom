<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

#[Title("Products - Aricuz")]
class ProductsPage extends Component
{

    public function updated()
    {
        $this->resetPage(); // Reset pagination when search/category changes
    }
    

    

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        return view('livewire.products-page', [
            'products' => $productQuery->paginate(9),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
