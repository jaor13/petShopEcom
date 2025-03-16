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
            return self::removeFromLikedProductsTable($product_id);
        }

        LikedProduct::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
        ]);

        return ['success' => 'Product added to liked products!'];
    }

    public static function removeFromLikedProductsTable($likedProductIds)
    {
        if (!is_array($likedProductIds)) {
            $likedProductIds = [$likedProductIds];
        }

        LikedProduct::where('user_id', Auth::id())
            ->whereIn('product_id', $likedProductIds)
            ->delete();

        return ['success' => 'Product removed from liked products!'];
    }

    public static function showLiked()
    {
        if (!Auth::check()) {
            return [];
        }
        return LikedProduct::where('user_id', Auth::id())->pluck('product_id')->toArray();
    }
}
