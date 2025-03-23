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
                                style="background-color:#00DCE3; color:white;" data-bs-toggle="modal"
                                data-bs-target="#reviewModal">
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
                            <img src="{{ $review->display_image }}" class="img-thumbnail rounded-lg me-3"
                                style="width: 80px; height: 80px; background-color: #E7FAFF; border: none;">

                            <div class="flex-grow-1">
                                <h5>{{ $review->orderItem->product->product_name ?? 'Unknown Product' }}</h5>

                                <div class="text-yellow-500">
                                    {!! str_repeat('⭐', $review->rating) !!}
                                    {!! str_repeat('☆', 5 - $review->rating) !!}
                                </div>
                                <p class="mb-0">{{ $review->comment }}</p>

                                <!-- Display Review Images -->
                                @if ($review->images && count($review->images) > 0)
                                    <div class="d-flex flex-wrap mt-2">
                                        @foreach ($review->images as $image)
                                            <img src="{{ url('storage/' . $image) }}" class="img-thumbnail me-2"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <button wire:click="editReview({{ $review->id }})" class="btn btn-warning btn-sm me-2">Edit</button>
                            <button wire:click="deleteReview({{ $review->id }})" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>

                        </div>
                    </div>
                @empty
                    <p class="text-center mt-4">You haven't left any reviews yet.</p>
                @endforelse
            @endif

        </div>
    </div>

    <!-- Review Modal -->
    <div wire:ignore.self class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
        aria-hidden="true">
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

                        <!-- Image Upload Field -->
                        <div class="mb-3">
                            <label class="form-label">Upload Images</label>
                            <input type="file" class="form-control" wire:model="images" multiple>
                            @error('images.*') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Image Preview-->
                        @if ($images)
                            <div class="d-flex flex-wrap mt-2">
                                @foreach ($images as $index => $image)
                                    <div class="position-relative me-2 mb-2" style="width: 100px; height: 100px;">
                                        <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail w-100 h-100"
                                            style="object-fit: cover;">

                                        <!-- Delete Button Inside the Image -->
                                        <button type="button" class="btn-close position-absolute top-0 end-0 p-1"
                                            wire:click="removeImage({{ $index }})"
                                            style="font-size: 12px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; margin: 5px;">
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @endif


                        <button type="submit" class="btn btn-success">
                            {{ $editingReviewId ? 'Update Review' : 'Submit Review' }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('show-review-modal', () => {
            var modal = new bootstrap.Modal(document.getElementById('reviewModal'));
            modal.show();
        });

        Livewire.on('hide-review-modal', () => {
            var modal = bootstrap.Modal.getInstance(document.getElementById('reviewModal'));
            if (modal) modal.hide();
            Livewire.dispatch('resetReviewForm');
        });
    });
</script>