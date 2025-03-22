<div>
<div class="container mt-4 p-0">
    <!-- Tab Navigation -->
    <ul class="d-flex mb-4 p-0">
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $activeTab === 'to_rate' ? 'active' : '' }}" 
               wire:click.prevent="switchTab('to_rate')" href="?tab=to_rate">
               <i class="fas fa-star-half-alt me-2"></i> To Rate
            </a>
        </li>
        <li class="nav-item flex-fill text-center">
            <a class="custom-link py-2 {{ $activeTab === 'my_reviews' ? 'active' : '' }}" 
               wire:click.prevent="switchTab('my_reviews')" href="?tab=my_reviews">
               <i class="fas fa-comments me-2"></i> My Reviews
            </a>
        </li>
    </ul>

    <div class="w-100 p-0">
        <!-- "To Rate" Tab -->
        @if ($activeTab === 'to_rate')
            @forelse ($orderedItems as $item)
                <div class="px-5 py-3 shadow-sm rounded mb-2 custom-card-design">
                    <div class="d-flex align-items-center">
                        <img src="{{ $item->display_image }}" class="img-thumbnail rounded-lg me-3" 
                             style="width: 80px; height: 80px; background-color: #E7FAFF; border: none;">
                        <div class="flex-grow-1">
                            <p><strong>{{ $item->product->product_name ?? 'Unknown Product' }}</strong></p>
                            <p>Variation: {{ $item->variant->name ?? 'N/A' }}</p>
                        </div>
                        <button wire:click="selectOrderItem({{ $item->id }})" class="btn"
                            style="background-color:#00DCE3; color:white;"
                            data-bs-toggle="modal" data-bs-target="#reviewModal">
                            Rate
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-center mt-4">No products to rate.</p>
            @endforelse
        @endif

        <!-- "My Reviews" Tab -->
        @if ($activeTab === 'my_reviews')
            @forelse ($reviews as $review)
                <div class="px-5 py-3 shadow-sm rounded mb-2 custom-card-design">
                    <div class="d-flex align-items-center">
                        <img src="{{ $review->product->image }}" class="img-thumbnail rounded-lg me-3" 
                             style="width: 80px; height: 80px; background-color: #E7FAFF; border: none;">
                        <div class="flex-grow-1">
                            <h5>{{ $review->product->product_name }}</h5>
                            <p class="text-warning">Rating: ⭐ {{ $review->rating }}</p>
                            <p class="mb-0">{{ $review->comment }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center mt-4">You haven't left any reviews yet.</p>
            @endforelse
        @endif
    </div>
</div>

<!-- Review Modal -->
<div wire:ignore.self class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submitReview">
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <span wire:click="setRating({{ $i }})"
                                    class="star {{ $rating >= $i ? 'text-warning' : 'text-secondary' }}"
                                    style="font-size: 1.5rem; cursor: pointer;">
                                    ★
                                </span>
                            @endfor
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea wire:model="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('reviewSubmitted', () => {
            var modal = new bootstrap.Modal(document.getElementById('reviewModal'));
            modal.hide();
        });
    });
</script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('reviewSubmitted', () => {
            var reviewTab = new bootstrap.Tab(document.getElementById('my-reviews-tab'));
            reviewTab.show();
        });
    });
</script>


