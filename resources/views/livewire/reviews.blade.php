<div class="container mt-4">
    <div class="table-responsive">
        <table class="table align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Variant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orderedItems as $item)
                    <tr>
                        <td>
                            <img src="{{ $item->display_image }}" alt="Product Image" class="img-thumbnail"
                                style="width: 80px; height: 80px; object-fit: cover;">
                        </td>
                        <td>{{ $item->product->product_name ?? 'Unknown Product' }}</td>
                        <td>{{ $item->variant->name ?? 'No Variant' }}</td>
                        <td>
                            <button wire:click="selectOrderItem({{ $item->id }})" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#reviewModal">
                                Rate
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">You haven't ordered any products yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Review Modal -->
    <div wire:ignore.self class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Leave a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                    <div class="mb-3">
                        <label for="images" class="form-label">Upload Images (optional)</label>
                        <input type="file" wire:model="images" multiple class="form-control">
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

