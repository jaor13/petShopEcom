<div class="container mt-5">
    <h1 class="text-2xl">
        @if(request('query') && request('category'))
            Search results for "{{ request('query') }}" in "{{ request('category') }}"
        @elseif(request('query'))
            Search results for "{{ request('query') }}"
        @elseif(request('category'))
            Products for "{{ request('category') }}"
        @elseif(request('type') === 'latest')
            Latest Products
        @elseif(request('type') === 'best_sellers')
            Best Selling Products
        @else
            All Products
        @endif
    </h1>

    <!-- If there's a filter (category, search, or type), show the Product Grid normally -->
    @if(request('query') || request('category') || request('type'))
        @livewire('partials.product-grid', [
            'limit' => 20,
            'query' => request('query'),
            'category' => request('category'),
            'type' => request('type')
        ])
    @else
        <!-- Show All Products Grouped by Category -->
        @foreach ($groupedProducts as $categoryName => $products)
            <h2 class="text-xl font-bold mt-4">{{ $categoryName }}</h2>
            @livewire('partials.product-grid', [
                'query' => null,
                'category' => $categoryName,
                'type' => null
            ])
        @endforeach
    @endif
</div>
