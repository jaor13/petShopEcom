<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Livewire\WithFileUploads;
use App\Models\OrderItem;

class Reviews extends Component
{
    use WithFileUploads;

    public $product;
    public $orderedItemId;
    public $orderItem;
    public $variantId;
    public $rating;
    public $comment;
    public $images = [];
    public $reviews = [];
    public $selectedOrderItemId = null;


    public function mount($orderedItemId = null)
    {
        if ($orderedItemId) {
            $orderItem = OrderItem::find($orderedItemId);
            $this->product = $orderItem ? Product::find($orderItem->product_id) : null;
        }

        if ($this->product) {
            $this->fetchReviews();
        } else {
            $this->reviews = collect(); 
        }
    }
    
    public function fetchReviews()
    {
        $this->reviews = Review::where('product_id', $this->product->id)
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

    public function submitReview()
    {
        $this->validate();

        $orderItem = OrderItem::find($this->selectedOrderItemId);
        if (!$orderItem) {
            session()->flash('error', 'Invalid Order Item.');
            return;
        }

        // Handle Image Uploads
        $uploadedImages = [];
        foreach ($this->images as $image) {
            $uploadedImages[] = $image->store('reviews', 'public');
        }

        // Save or Update Review
        Review::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $orderItem->product_id,
                'variant_id' => $orderItem->variant_id,
            ],
            [
                'rating' => $this->rating,
                'comment' => $this->comment,
                'images' => $uploadedImages,
            ]
        );

        session()->flash('success', 'Review submitted successfully!');
        $this->reset(); // Reset form fields
        $this->dispatch('hide-review-modal'); // Hide modal
    }

    public function render()
    {
        $orderedItems = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->with('product', 'variant')->get();

        foreach ($orderedItems as $item) {
            if ($item->variant && $item->variant->image) {
                $item->display_image = url('storage/' . $item->variant->image);
            } elseif (!empty($item->product->images) && is_array($item->product->images)) {
                $item->display_image = url('storage/' . $item->product->images[0]);
            } else {
                $item->display_image = asset('default.jpg'); 
            }
        }

        return view('livewire.reviews', [
            'orderedItems' => $orderedItems,
            'averageRating' => $this->product ? number_format($this->product->reviews()->avg('rating'), 1) : '0.0',
            'totalReviews' => $this->product ? $this->product->reviews()->count() : 0,
        ]);
    }
}
