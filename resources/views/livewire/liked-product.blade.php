<div>
    @if (!empty($likedProducts))
        @livewire('partials.product-grid', ['likedProducts' => $likedProducts])
    @else
        <p class="text-gray-500">No liked products yet.</p>
    @endif
</div>
