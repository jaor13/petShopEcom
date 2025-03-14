<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\Product;
use Auth;
use Illuminate\Console\View\Components\Alert;

class CartManagement
{
    // Add item to cart
    static public function addItemToCart($product_id, $variant_name = null)
    {
        // // dd($product_id,  $variant_name);
        $cart_items = self::getCartItemsFromDB();
        // dd($cart_items);
        $existing_item = null;

        //check if nasa cart na su item
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id && $item['variant_name'] == $variant_name) {
                $existing_item = $key;
                break;
            }
        }

        // dd($existing_item);
        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = 1;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount']; // Update total price
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
        // dd($cart_items);

        self::addCartItemsToDB($cart_items);
        return count($cart_items);
    }

    // Add item to cart with quantity 
    // Includes variant's name and price
    static public function addItemToCartWithQty($product_id, $qty = 1, $variant_name = null, $variant_price = null)
    {
        $cart_items = self::getCartItemsFromDB();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id && $item['variant_name'] == $variant_name) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = $qty;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::where('id', $product_id)->with('variants')->first(['id', 'product_name', 'slug', 'price', 'images']);

            if ($product) {
                $unit_price = $variant_price ?? $product->price;

                // If base product's image is empty
                $image = !empty($product->images) ? $product->images[0] : 'default-image.jpg';
                if ($variant_name) {
                    $variant = $product->variants->where('name', $variant_name)->first();
                    if ($variant) {
                        $image = $variant->image ?? $image; // Use variant image if available
                    }
                }

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

        self::addCartItemsToDB($cart_items);
        return count($cart_items);
    }



    // Remove item from cart
    static public function removeCartItem($product_id, $variant_name = null)
    {
        $query = Cart::where('product_id', $product_id);

        if (auth()->check()) {
            $query->where('user_id', auth()->id());
        } else {
            $query->where('session_id', session()->getId());
        }

        // Ensure it deletes even if `variant_name` is NULL
        $query->where(function ($q) use ($variant_name) {
            if ($variant_name !== null) {
                $q->where('variant_name', $variant_name)
                    ->orWhereNull('variant_name'); // Include items with NULL variant
            } else {
                $q->whereNull('variant_name'); // Only delete items without a variant
            }
        });

        // dd($query->toSql(), $query->getBindings());

        $query->delete();

        return self::getCartItemsFromDB();

    }


    // Add cart items to db
    static public function addCartItemsToDB($cart_items)
    {
        // dd($cart_items);
        // self::clearCartItems();
        foreach ($cart_items as $item) {
            $user_id = Auth::id();
            $session_id = $user_id ? null : session()->getId(); // Use session for guest users

            // Check if the product with the same variant already exists in the cart
            $existingCartItem = Cart::where('product_id', $item['product_id'])
                ->where('variant_name', $item['variant_name'])
                ->where(function ($query) use ($user_id, $session_id) {
                    if ($user_id) {
                        $query->where('user_id', $user_id);
                    } else {
                        $query->where('session_id', $session_id);
                    }
                })
                ->first();

            if ($existingCartItem) {
                // If the item already exists in the cart, update its quantity and total price
                $existingCartItem->quantity = $item['quantity']; // Set the quantity to the new value (not incrementing)
                $existingCartItem->total_amount = $item['quantity'] * $existingCartItem->unit_amount; // Update the total price
                $existingCartItem->save(); // Save the updated record to the database
            } else {
                Cart::create([
                    'user_id' => $user_id,
                    'session_id' => $user_id ? null : $session_id,
                    'product_id' => $item['product_id'],
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'variant_name' => $item['variant_name'],
                    'image' => $item['image'],
                    'quantity' => $item['quantity'],
                    'unit_amount' => $item['unit_amount'],
                    'total_amount' => $item['total_amount'],
                ]);
            }
        }
    }

    // Clear cart items from db
    static public function clearCartItems()
    {
        $user_id = Auth::id();
        $session_id = session()->getId(); // Get session ID for guest users

        // Delete cart items for logged-in users or guest users
        Cart::where(function ($query) use ($user_id, $session_id) {
            if ($user_id) {
                $query->where('user_id', $user_id);
            } else {
                $query->where('session_id', $session_id);
            }
        })->delete();
    }

    // Get all cart items from db
    static public function getCartItemsFromDB()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())
                ->select('id as cart_id', 'product_id', 'name', 'slug', 'variant_name', 'image', 'quantity', 'unit_amount', 'total_amount')
                ->get()
                ->toArray();
        } else {
            $session_id = session()->getId();
            return Cart::where('session_id', $session_id)
                ->select('id as cart_id', 'product_id', 'name', 'slug', 'variant_name', 'image', 'quantity', 'unit_amount', 'total_amount')
                ->get()
                ->toArray();
        }
    }


    static public function getCartItemIds()
    {
        if (Auth::check()) {
            $cart_ids = Cart::where('user_id', Auth::id())
                ->whereIn('id', session()->get('selected_cart_items', []))
                ->pluck('id')
                ->toArray();
        } else {
            $cart_ids = Cart::where('session_id', session()->getId())
                ->whereIn('id', session()->get('selected_cart_items', []))
                ->pluck('id')
                ->toArray();
        }

        dd($cart_ids); 

        return $cart_ids;
    }



    // Increment item quantity
    static public function incrementQuantityToCartItem($product_id, $variant_name = null)
    {
        $query = Cart::where('product_id', $product_id);

        if (auth()->check()) {
            $query->where('user_id', auth()->id());
        } else {
            $query->where('session_id', session()->getId());
        }

        if ($variant_name) {
            $query->where('variant_name', $variant_name);
        } else {
            $query->whereNull('variant_name');
        }

        $cart_item = $query->first();

        if ($cart_item) {
            $cart_item->quantity += 1; // Increase by 1
            $cart_item->total_amount = $cart_item->quantity * $cart_item->unit_amount;
            $cart_item->save();
        }

        return self::getCartItemsFromDB();
    }

    // Decrement item quantity
    static public function decrementQuantityToCartItem($product_id, $variant_name = null)
    {
        $query = Cart::where('product_id', $product_id);

        if (auth()->check()) {
            $query->where('user_id', auth()->id());
        } else {
            $query->where('session_id', session()->getId());
        }

        if ($variant_name) {
            $query->where('variant_name', $variant_name);
        } else {
            $query->whereNull('variant_name');
        }

        $cart_item = $query->first();

        if ($cart_item && $cart_item->quantity > 1) {
            $cart_item->quantity -= 1; // Decrease by 1
            $cart_item->total_amount = $cart_item->quantity * $cart_item->unit_amount;
            $cart_item->save();
        }

        return self::getCartItemsFromDB();
    }


    // Calculate grand total
    static public function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));
    }

}