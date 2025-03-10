<?php

namespace App\Helpers;

use App\Models\LikedProduct;
use Illuminate\Support\Facades\Auth;

class LikedProductManagement
{
    // Add a product to the liked list
    public static function addToLiked($product_id)
    {
        if (!Auth::check()) {
            return ['error' => 'You need to log in to like products.'];
        }

        LikedProduct::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
        ]);

        return ['success' => 'Product added to liked items!'];
    }
}
