<?php

namespace App\Helpers;

use App\Models\LikedProduct;
use Illuminate\Support\Facades\Auth;

class LikedProductManagement
{
    public static function addToLikedProductsTable($product_id)
    {
        if (!Auth::check()) {
            return ['error' => 'You need to log in to like products.'];
        }

        $existing = LikedProduct::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($existing) {
            // if existing, delete
            return self::removeFromLikedProductsTable($product_id);
        }

        LikedProduct::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
        ]);

        return ['success' => 'Product added to liked items!'];
    }

    public static function removeFromLikedProductsTable($product_id)
    {
        LikedProduct::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->delete();

        return ['success' => 'Product removed from liked items!'];
    }
}
