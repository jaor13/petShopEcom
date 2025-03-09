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
    $query = request('query');
    $categoryFilter = request('category');
    $type = $this->type;

    // Fetch categories
    $categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);

    // Fetch products based on filters
    $products = Product::query()->where('is_active', 1);

    if ($query) {
        $products->where('product_name', 'like', "%{$query}%");
    }

    if ($categoryFilter) {
        $products->whereHas('categories', function ($q) use ($categoryFilter) {
            $q->where('name', 'like', "%{$categoryFilter}%");
        });
    }

    if ($type === 'latest') {
        $products->orderBy('created_at', 'desc');
    } elseif ($type === 'best_sellers') {
        $products->orderBy('sold_count', 'desc');
    }

    $groupedProducts = [];

    if (!$categoryFilter) {
        // Group products by category when "All Categories" is selected
        foreach ($categories as $category) {
            $groupedProducts[$category->name] = Product::where('is_active', 1)
                ->whereHas('categories', function ($q) use ($category) {
                    $q->where('name', $category->name);
                })
                ->get();
        }
    }

    return view('livewire.products-page', [
        'categories' => $categories,
        'products' => $categoryFilter ? $products->get() : [],
        'groupedProducts' => $categoryFilter ? [] : $groupedProducts,
        'type' => $type,
    ]);
}

}
