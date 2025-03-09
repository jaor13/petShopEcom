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

    <!-- Product Grid -->
    @livewire('partials.product-grid', ['query' => request('query'), 'category' => request('category')])

</div>
</div>