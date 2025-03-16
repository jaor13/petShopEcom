<div class="container mt-5">
    <div class="mx-4 px-3">
        <h1 class="text-3xl font-bold">
            @if(request('query') && request('category'))
                Search results for "{{ request('query') }}" in "{{ request('category') }}"
            @elseif(request('query'))
                Search results for "{{ request('query') }}"
            @elseif(request('category'))
                Products for "{{ request('category') }}"
            @elseif(request('type') === 'latest')
                New Released Products
            @elseif(request('type') === 'best_sellers')
                Best Seller Products
            @else

            @endif
        </h1>
    </div>

    <div>
        @if(request('query') || request('category') || request('type'))
                @livewire('partials.product-grid', [
                        'limit' => 20,
                        'query' => request('query'),
                        'category' => request('category'),
                        'type' => request('type')
                    ])
        @else
           @foreach ($groupedProducts as $categoryName => $products)
            <div class="mx-4 px-3">
                <h1 class="text-3xl font-bold">{{ $categoryName }}</h1>
            </div>

            <div class="mb-12"> 
                @livewire('partials.product-grid', [
                    'query' => null,
                    'category' => $categoryName,
                    'type' => null
                ])
            </div>
        @endforeach
        @endif
    </div>
</div>
