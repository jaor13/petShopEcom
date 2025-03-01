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
    public $category;
    public $search;

    use WithPagination;

    public function mount()
    {
        $this->category = request('category', null);  // Get category from URL
        $this->search = request('query', null);       // Get search query from URL
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        // 🔹 Filter by category if selected
        if ($this->category) {
            $productQuery->whereHas('category', function ($q) {
                $q->where('name', $this->category);
            });            
        }

        // 🔹 Filter by search query if entered
        if ($this->search) {
            $productQuery->where('product_name', 'LIKE', '%' . $this->search . '%');
        }
        // dd($productQuery->toSql(), $productQuery->getBindings());

        return view('livewire.products-page', [
            'products' => $productQuery->paginate(9),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
