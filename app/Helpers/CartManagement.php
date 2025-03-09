<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    // Add item to cart
    static public function addItemToCart($product_id, $variant_name = null)
    {   
        // dd($product_id);
        \Log::info("Adding to cart: Product ID {$product_id}, Variant: {$variant_name}");
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id && $item['variant_name'] == $variant_name) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'product_name', 'slug', 'price', 'images']);
            
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,
                    'name' => $product->product_name,
                    'slug' => $product->slug,
                    'image' => $product->images[0],
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                    'variant_name' => $variant_name,
                ];
            }
        }
        
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // Add item to cart with quantity 
    // Includes variant's name and price
    static public function addItemToCartWithQty($product_id, $qty = 1, $variant_name = null, $variant_price = null)
{   
    $cart_items = self::getCartItemsFromCookie();

    $existing_item = null;

    foreach ($cart_items as $key => $item) {
        if ($item['product_id'] == $product_id && $item['variant_name'] == $variant_name) {
            $existing_item = $key;
            break;
        }
    }

    if ($existing_item !== null) {
        // If the item exists, update quantity and total price
        $cart_items[$existing_item]['quantity'] = $qty;
        $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
    } else {
        // Fetch product details
        $product = Product::where('id', $product_id)->with('variants')->first(['id', 'product_name', 'slug', 'price', 'images']);

        if ($product) {
            // Use the variant price if a variant is selected, otherwise use the product price
            $unit_price = $variant_price ?? $product->price;

            // If base product's image is empty
            $image = !empty($product->images) ? $product->images[0] : 'default-image.jpg';
            if ($variant_name) {
                $variant = $product->variants->where('name', $variant_name)->first();
                if ($variant) {
                    $image = $variant->image ?? $image; // Use variant image if available
                }
            }

            // Add new item to cart
            $cart_items[] = [
                'product_id' => $product_id,
                'name' => $product->product_name,
                'slug' => $product->slug,
                'image' => $image,
                'quantity' => $qty,
                'unit_amount' => $unit_price, 
                'total_amount' => $unit_price * $qty,
                'variant_name' => $variant_name,
            ];
        }
    }

    self::addCartItemsToCookie($cart_items);
    return count($cart_items);
}


    // Remove item from cart
    static public function removeCartItem($product_id, $variant_name = null) 
{
    $cart_items = self::getCartItemsFromCookie();

    foreach ($cart_items as $key => $item) {
        if ($item['product_id'] == $product_id && ($item['variant_name'] === $variant_name || $item['variant_name'] === null)) {
            unset($cart_items[$key]);
            break; // Stop after removing the first matching item
        }
    }

    self::addCartItemsToCookie(array_values($cart_items));

    return $cart_items;
}



    // Add cart items to cookie
    static public function addCartItemsToCookie($cart_items)
    {
        // dd($cart_items);
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30); //saved to browser for 30 days
    }

    // Clear cart items from cookie
    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }  

    // Get all cart items from cookie
    static public function getCartItemsFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items) {
            $cart_items = [];
        }

        // dd($cart_items);
        return $cart_items;
    }

    // Increment item quantity
    static public function incrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // Decrement item quantity
    static public function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount']  = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                }
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // Calculate grand total
    static public function calculateGrandTotal($items) {
        return array_sum(array_column($items, 'total_amount'));
    }

}