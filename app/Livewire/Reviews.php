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
    public $state;

    public function mount($orderedItemId = null)
    {
        if ($orderedItemId) {
            $this->orderItem = OrderItem::find($orderedItemId);
            $this->product = $this->orderItem ? $this->orderItem->product : null;
        }

        $this->fetchReviews();
    }

    protected function getListeners()
    {
        return [
            'resetReviewForm' => 'resetReviewForm',
        ];
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
        'images' => 'array|max:4',
        'images.*' => 'image|max:2048', // Each image max 2MB
    ];

    public function selectOrderItem($orderItemId)
    {
        $this->state = 'new';
        $this->reset(['rating', 'comment', 'images', 'editingReviewId']);
        $this->selectedOrderItemId = $orderItemId;
        $this->rating = null;
        $this->comment = null;
        $this->images = [];
        $this->dispatch('show-review-modal');
    }

    public function setRating($value)
    {
        $this->rating = $value;
    }


    public function resetReviewForm()
    {
        $this->reset(['rating', 'images', 'selectedOrderItemId', 'editingReviewId']);
        $this->comment = ''; // Ensure comment resets to an empty string
    }



    public function deleteReview($reviewId)
    {
        $review = Review::where('id', $reviewId)->where('user_id', auth()->id())->first();
        if ($review) {
            $review->delete();
            $this->fetchReviews();
            $this->alert('success', 'Review deleted successfully.', [
                'position' => 'bottom-end',
                'timer' => 5000,
                'toast' => true,
            ]);
        } else {
            $this->alert('error', 'Unable to delete review.', [
                'position' => 'bottom-end',
                'timer' => 5000,
                'toast' => true,
            ]);
        }
    }

    public function editReview($reviewId)
    {
        $this->state = 'edit';
        $review = Review::find($reviewId);

        if (!$review) {
            $this->alert('error', 'Review not found!', [
                'position' => 'bottom-end',
                'timer' => 5000,
                'toast' => true,
            ]);
            return;
        }

        
        $this->editingReviewId = $review->id; // FIX: Set editingReviewId correctly
        $this->rating = $review->rating;
        $this->comment = $review->comment ?? '';

        // Only set images if it's an array, otherwise, set an empty array
        $this->images = is_array($review->images) ? $review->images : [];

        $this->selectedOrderItemId = $review->order_item_id;
        
        $this->dispatch('show-review-modal');

        $this->alert('success', 'Edit OK', [
            'position' => 'bottom-end',
            'timer' => 5000,
            'toast' => true,
        ]);

        // dd($this->editingReviewId, $this->rating, $this->comment, $this->images); 

    }


    public function submitReview()
{
    try {
        $validationRules = [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ];

        if ($this->images && is_array($this->images) && count($this->images) > 0 && $this->images[0] instanceof \Illuminate\Http\UploadedFile) {
            $validationRules['images'] = 'array|max:4';
            $validationRules['images.*'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $this->validate($validationRules);
        // dd('Validation passed!');

        // Check if selected order item exists
        $orderItem = OrderItem::find($this->selectedOrderItemId);
        if (!$orderItem) {
            dd('Order Item not found!', $this->selectedOrderItemId);
        }

        // Retrieve existing review
        $existingReview = $this->editingReviewId ? Review::find($this->editingReviewId) : null;
        if ($this->editingReviewId && !$existingReview) {
            dd('Editing Review not found!', $this->editingReviewId);
        }

        // Retrieve existing images
        $existingImages = $existingReview ? $existingReview->images : [];
        
        // Debug Images Before Processing
        // dd('Existing Images:', $existingImages, 'New Images:', $this->images);

        // Upload new images if any
        $uploadedImages = [];
        if ($this->images && is_array($this->images)) {
            foreach ($this->images as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    try {
                        $uploadedImages[] = $image->store('reviews', 'public');
                    } catch (\Exception $ex) {
                        dd('Image Upload Error:', $ex->getMessage());
                    }
                } else {
                    $uploadedImages[] = $image; // Preserve old images
                }
            }
        }

        // Merge old and new images
        $finalImages = array_slice(array_merge($existingImages, $uploadedImages), 0, 4);
        
        // dd('Final Images:', $finalImages);

        Review::updateOrCreate(
            [
                'id' => $this->editingReviewId,
                'user_id' => Auth::id(),
                'order_item_id' => $orderItem->id,
            ],
            [
                'rating' => $this->rating,
                'comment' => $this->comment,
                'images' => $finalImages,
                'product_id' => $orderItem->product_id,
                'variant_id' => $orderItem->variant_id,
            ]
        );

        // dd('Review saved successfully!');

        $this->fetchReviews();

        $this->alert('success', $this->editingReviewId ? 'Review updated.' : 'Review submitted.', [
            'position' => 'bottom-end',
            'timer' => 5000,
            'toast' => true,
        ]);

        $this->reset(['rating', 'comment', 'images', 'selectedOrderItemId', 'editingReviewId']);
        $this->dispatch('hide-review-modal');

    } catch (\Illuminate\Validation\ValidationException $e) {
        dd('Validation failed:', $e->errors());
    } catch (\Exception $e) {
        dd('Unexpected Error:', $e->getMessage());
    }
}

    


    public function removeImage($index)
    {
        if (isset($this->images[$index])) {
            unset($this->images[$index]);
            $this->images = array_values($this->images); // Re-index array
        }
    }


    public function refreshToRateList()
    {
        $this->render();
    }

    public function render()
    {
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

        $reviews = Review::where('user_id', auth()->id())
            ->with(['orderItem.product', 'orderItem.variant'])
            ->get();

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