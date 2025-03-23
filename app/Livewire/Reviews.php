<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Livewire\WithFileUploads;
use App\Models\OrderItem;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Reviews extends Component
{
    use WithFileUploads, LivewireAlert;

    public $product;
    public $orderedItemId;
    public $orderItem;
    public $rating;
    public $comment;
    public $images = [];
    public $reviews = [];
    public $selectedOrderItemId = null;
    public $activeTab = 'to_rate';
    public $editingReviewId = null;

    public function mount($orderedItemId = null)
    {
        if ($orderedItemId) {
            $this->orderItem = OrderItem::find($orderedItemId);
            $this->product = $this->orderItem ? $this->orderItem->product : null;
        }

        $this->fetchReviews();
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function fetchReviews()
    {
        $this->reviews = Review::where('user_id', auth()->id())
            ->with('orderItem.product', 'orderItem.variant')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
        'images.*' => 'image|max:2048', // Each image max 2MB
    ];

    public function selectOrderItem($orderItemId)
    {
        $this->selectedOrderItemId = $orderItemId;
        $this->rating = null;
        $this->comment = '';
        $this->images = [];
        $this->dispatch('show-review-modal');
    }

    public function setRating($value)
    {
        $this->rating = $value;
    }


public function editReview($reviewId)
{
    $review = Review::find($reviewId);
    if (!$review || $review->user_id !== auth()->id()) {
        session()->flash('error', 'Invalid review.');
        return;
    }

    // Set review data for editing
    $this->editingReviewId = $review->id;
    $this->selectedOrderItemId = $review->order_item_id;
    $this->rating = $review->rating;
    $this->comment = $review->comment;
    $this->images = $review->images;

    $this->dispatch('show-review-modal'); // Show the modal
}

public function deleteReview($reviewId)
{
    $review = Review::where('id', $reviewId)->where('user_id', auth()->id())->first();
    if ($review) {
        $review->delete();
        $this->fetchReviews(); // Refresh reviews after deleting
        $this->alert('success', 'Review deleted successfully.');
    } else {
        $this->alert('error', 'Unable to delete review.');
    }
}

public function submitReview()
{
    $this->validate();

    $orderItem = OrderItem::find($this->selectedOrderItemId);
    if (!$orderItem) {
        session()->flash('error', 'Invalid Order Item.');
        return;
    }

    $uploadedImages = [];
    foreach ($this->images as $image) {
        $uploadedImages[] = $image->store('reviews', 'public');
    }

    Review::updateOrCreate(
        [
            'id' => $this->editingReviewId, // If editing, use existing review ID
            'user_id' => Auth::id(),
            'order_item_id' => $orderItem->id,
        ],
        [
            'rating' => $this->rating,
            'comment' => $this->comment,
            'images' => $uploadedImages,
        ]
    );

    $this->fetchReviews(); // Refresh reviews

    $this->alert('success', $this->editingReviewId ? 'Review updated.' : 'Review submitted.');

    $this->reset(['editingReviewId', 'rating', 'comment', 'images', 'selectedOrderItemId']);
    $this->dispatch('hide-review-modal');
}


    public function refreshToRateList()
    {
        $this->render();
    }

    public function render()
    {
        // Fetch items that are eligible for review
        $orderedItems = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id())->where('status', 'Completed');
        })
            ->whereDoesntHave('review')
            ->with('product', 'variant')
            ->get();

        foreach ($orderedItems as $item) {
            if ($item->variant && $item->variant->image) {
                $item->display_image = url('storage/' . $item->variant->image);
            } elseif (!empty($item->product->images) && is_array($item->product->images)) {
                $item->display_image = url('storage/' . $item->product->images[0]);
            } else {
                $item->display_image = asset('default.jpg');
            }
        }

        // Fetch user's reviews
        $reviews = Review::where('user_id', auth()->id())
            ->with(['orderItem.product', 'orderItem.variant'])
            ->get();

        // Process images for each review
        foreach ($this->reviews as $review) {
            $orderItem = $review->orderItem;
        
            if ($orderItem && $orderItem->variant && $orderItem->variant->image) {
                $review->display_image = url('storage/' . $orderItem->variant->image);
            } elseif ($orderItem && $orderItem->product && !empty($orderItem->product->images) && is_array($orderItem->product->images)) {
                $review->display_image = url('storage/' . $orderItem->product->images[0]);
            } else {
                $review->display_image = asset('default.jpg');
            }
        }
        

        return view('livewire.reviews', [
            'orderedItems' => $orderedItems,
            'averageRating' => $this->product ? number_format($this->product->reviews()->avg('rating'), 1) : '0.0',
            'totalReviews' => $this->product ? $this->product->reviews()->count() : 0,
        ]);
    }
}
