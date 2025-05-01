<div class="container mt-5 bg-white rounded-3" style="padding:2em 4em 2em 2em;">
<div class="mx-4 px-3 " style="display: flex; justify-content: space-between; align-items: center;">
            @if(!collect($products)->isEmpty() || request('query') || request('category') || request('type'))
                <h1 style="font-weight: bold; color:#4F4F4F; font-size: xx-large; margin-bottom: 0; ">
                 <button class="btn p-0 me-2" style="color: #4F4F4F;" onclick="history.back()">
                    <i class="fas fa-arrow-left" style="font-size: 24px;"></i>
                </button>
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
                <div class="d-flex align-items-center">
                    <label for="sortPrice" class="me-2 mt-1">Sort by Price:</label>
                    <select id="sortPrice" class="form-select-sm w-auto" onchange="updateSorting(this.value)" >
                        <option value="">Default</option>
                        <option value="asc" {{ request('sortPrice') == 'asc' ? 'selected' : '' }} >Low to High</option>
                        <option value="desc" {{ request('sortPrice') == 'desc' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </div>
            @endif
        </div>

    <div>
        @if(request('query') || (request('category') && request('category') !== 'All Categories') || request('type'))
                @livewire('partials.product-grid', [
                    'limit' => 20,
                    'query' => request('query'),
                    'category' => request('category'),
                    'type' => request('type'),
                    'sortPrice' => request('sortPrice')
                ])
        @else
        @foreach ($groupedProducts as $categoryName => $products)
        <div class="mx-4 px-3 d-flex justify-content-between align-items-center">
    <h1 style="font-weight: bold; color:#4F4F4F; font-size: xx-large; margin-bottom: 0;">
        {{ $categoryName }}
    </h1>

    <div class="d-flex align-items-center">
        <label for="sortPrice" class="me-2 mt-1">Sort by Price:</label>
        <select id="sortPrice" class="form-select-sm w-auto" onchange="updateSorting(this.value, '{{ $categoryName }}')">
            <option value="">Default</option>
            <option value="asc" {{ request('sortPrice') == 'asc' && request('category') == $categoryName ? 'selected' : '' }}>Low to High</option>
            <option value="desc" {{ request('sortPrice') == 'desc' && request('category') == $categoryName ? 'selected' : '' }}>High to Low</option>
        </select>
    </div>
</div>



            <div class="mb-12"> 
                @livewire('partials.product-grid', [
                    'query' => null,
                    'category' => $categoryName,
                    'type' => null,
                    'sortPrice' => request('sortPrice')
                ])
            </div>
        @endforeach

        @endif
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <script>
        function updateSorting(value, category = null) {
            let url = new URL(window.location.href);

            if (category) {
                url.searchParams.set('category', category);
            } else if (url.searchParams.has('category')) {
                category = url.searchParams.get('category'); 
            }

            url.searchParams.set('sortPrice', value); 

            window.location.href = url.toString();
        }
    </script>

</div>
