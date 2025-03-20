<div class="container mt-5 bg-white rounded-3" style="padding:2em 4em 2em 2em;">
    <div class="mx-4 px-3">
        @if(!collect($products)->isEmpty() || request('query') || request('category') || request('type'))
            <h1 style="font-weight: bold; color:#4F4F4F; font-size: xx-large;">
                @if(request('query') && request('category') && request('category') !== 'All Categories')
                    Search results for "{{ request('query') }}" in "{{ request('category') }}"
                @elseif(request('query') && request('category') === 'All Categories')
                    Search results for "{{ request('query') }}" in All Categories
                @elseif(request('query'))
                    Search results for "{{ request('query') }}"
                @elseif(request('category') && request('category') !== 'All Categories')
                    Products for "{{ request('category') }}"
                @elseif(request('category') === 'All Categories')
                    All Products
                @elseif(request('type') === 'latest')
                    New Released Products
                @elseif(request('type') === 'best_sellers')
                    Best Seller Products
                @endif
            </h1>
        @endif        
    </div>

    <div>
        @if(request('query') || (request('category') && request('category') !== 'All Categories') || request('type'))
            @livewire('partials.product-grid', [
                'limit' => 20,
                'query' => request('query'),
                'category' => request('category'),
                'type' => request('type')
            ])
        @else
           @foreach ($groupedProducts as $categoryName => $products)
            <div class="mx-4 px-3">
                <h1 style="font-weight: bold; color:#4F4F4F; font-size: xx-large;">{{ $categoryName }}</h1>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</div>
