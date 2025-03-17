<div class="container mt-5 bg-white rounded-3" style="padding:2em 4em 2em 2em;">
    <div class="mx-4 px-3">
        <h1 style="font-weight: bold; color:#4F4F4F; font-size: xx-large;">
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
        @if(request('query')|| request('category') || request('type'))
            @if(request('query'))
                @if(collect($products)->isEmpty())  
                <div class="text-center text-gray-500 text-lg font-semibold mt-10">
                    No products found for "{{ request('query') }}"
                </div>
                @endif
            @endif

            @livewire('partials.product-grid', [
                'limit' => 20,
                'query' => request('query'),
                'category' => request('category'),
                'type' => request('type')
            ])
        @else
           @foreach ($groupedProducts as $categoryName => $products)
            <div class="mx-4 px-3" style="padding:2em 4em 0em 2em;">
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
