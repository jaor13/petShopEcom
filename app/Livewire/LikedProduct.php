<?php

namespace App\Livewire;

use App\Helpers\LikedProductManagement;
use App\Models\LikedProducts;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Title("Liked Products - Aricuz")]

class LikedProduct extends Component
{

    public $likedProducts = [];

    public function mount()
    {
        if (Auth::check()) {
            $this->likedProducts = LikedProductManagement::showLiked();
        }
    }

    public function render()
    {
        return view('livewire.liked-product');
    }
}
