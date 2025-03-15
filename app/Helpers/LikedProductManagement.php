<?php

namespace App\Helpers;

use App\Models\LikedProduct;
use Illuminate\Support\Facades\Auth;

class LikedProductManagement
{
    public $selectedProducts = [];

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

    public static function removeFromLikedProductsTable(array $likedProductIds)
    {
        // dd($likedProductIds);
        LikedProduct::where('user_id', Auth::id())
            ->whereIn('id', $likedProductIds) // Delete by liked_products.id, not product_id
            ->delete();

        return ['success' => 'Selected products removed from liked items!'];
    }


    public static function showLiked()
    {
        if (!Auth::check()) {
            return [];
        }

        return LikedProduct::where('user_id', Auth::id())->pluck('product_id')->toArray();
    }
}
