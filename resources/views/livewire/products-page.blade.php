<div class="container mt-5">
    <h1 class="text-2xl">
        @if(request('query') && request('category'))
            Search results for "{{ request('query') }}" in "{{ request('category') }}"
        @elseif(request('query'))
            Search results for "{{ request('query') }}"
        @elseif(request('category'))
            Products for "{{ request('category') }}"
        @else
            All Products
        @endif
    </h1>

    @livewire('partials.product-grid', ['category' => request('category'), 'search' => request('query')])
    </div>