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
    public $isOpen = false;
    public $imageUrl = null;

    public function mount($orderedItemId = null)
    {
        if ($orderedItemId) {
            $this->orderItem = OrderItem::find($orderedItemId);
            $this->product = $this->orderItem ? $this->orderItem->product : null;
        }

        $this->fetchReviews();
    }


    public function openImageModal($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        $this->isOpen = true;
    }

    public function closeImageModal()
    {
        $this->isOpen = false;
        $this->imageUrl = null;
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
        $this->comment = '';
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

        $this->editingReviewId = $review->id;
        $this->rating = $review->rating;
        $this->comment = $review->comment ?? '';

        $this->images = is_array($review->images) ? $review->images : [];

        $this->selectedOrderItemId = $review->order_item_id;

        $this->dispatch('show-review-modal');
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
                $validationRules['images.*'] = 'image|mimes:jpeg,png,jpg|max:2048';
            }

            $customMessages = [
                'rating.required' => 'Please select a rating before submitting.',
                'images.array' => 'Something went wrong with the uploaded images.',
                'images.max' => 'You can only upload up to 4 images.',
                'images.*.image' => 'One or more files are not valid images.',
                'images.*.mimes' => 'Images must be in JPEG, PNG, or JPG format',
                'images.*.max' => 'Each image must be less than 2MB.',
            ];

            $this->validate($validationRules, $customMessages);

            // $this->validate($validationRules);

            $orderItem = OrderItem::find($this->selectedOrderItemId);
            if (!$orderItem) {
                dd('Order Item not found!', $this->selectedOrderItemId);
            }

            $existingReview = $this->editingReviewId ? Review::find($this->editingReviewId) : null;

            $existingImages = $existingReview ? (is_array($existingReview->images) ? $existingReview->images : []) : [];

            $uploadedImages = [];
            if ($this->images && is_array($this->images)) {
                foreach ($this->images as $image) {
                    if ($image instanceof \Illuminate\Http\UploadedFile) {
                        $uploadedImages[] = $image->store('reviews', 'public');
                    }
                }
            }

            $finalImages = array_values(array_unique(array_merge($existingImages, $uploadedImages)));

            if ($existingReview) {
                $existingReview->update([
                    'rating' => $this->rating,
                    'comment' => $this->comment,
                    'images' => $finalImages,
                    'product_id' => $orderItem->product_id,
                    'variant_id' => $orderItem->variant_id,
                ]);
            } else {
                Review::create([
                    'user_id' => Auth::id(),
                    'order_item_id' => $orderItem->id,
                    'rating' => $this->rating,
                    'comment' => $this->comment,
                    'images' => $finalImages,
                    'product_id' => $orderItem->product_id,
                    'variant_id' => $orderItem->variant_id,
                ]);
            }

            $this->fetchReviews();

            $this->alert('success', $this->state === 'edit' ? 'Review updated.' : 'Review submitted.', [
                'position' => 'bottom-end',
                'timer' => 5000,
                'toast' => true,
            ]);

            // Reset state
            $this->reset(['rating', 'comment', 'images', 'selectedOrderItemId', 'editingReviewId', 'state']);
            $this->dispatch('hide-review-modal');

        } catch (\Illuminate\Validation\ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->alert('error', $message, [
                        'position' => 'bottom-end',
                        'timer' => 5000,
                        'toast' => true,
                    ]);
                }
            }
        } catch (\Exception $e) {
            $this->alert('error', 'Unexpected error: ' . $e->getMessage(), [
                'position' => 'bottom-end',
                'timer' => 5000,
                'toast' => true,
            ]);
        }
    }

    public function removeImage($index)
    {
        if (isset($this->images[$index])) {
            $removedImage = $this->images[$index];
            unset($this->images[$index]);

            $this->images = array_values($this->images);

            if ($this->editingReviewId) {
                $review = Review::find($this->editingReviewId);
                if ($review) {
                    $reviewImages = is_array($review->images) ? $review->images : [];
                    $reviewImages = array_filter($reviewImages, fn($img) => $img !== $removedImage);

                    $review->images = array_values($reviewImages);
                    $review->save();
                }
            }
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