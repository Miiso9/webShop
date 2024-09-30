<?php

namespace App\Helpers;


use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Arr;



/**
 *
 * @package App\Models\Helpers
 */
class Cart
{
    public static function getCartItemsCount(): int
    {
        $request = \request();
        $user = $request->user();
        if($user) {
            return CartItem::where('user_id', $user->id)->sum('quantity');
        }else {
            $cartItems = self::getCookieCartItems();

            return array_reduce(
                $cartItems,
                fn($carry, $item) => $carry + $item['quantity'],
                0
            );
        }
    }

    public static  function getCartItems()
    {
        $request = \request();
        $user = $request->user();
        if($user) {
            return CartItem::where('user_id', $user->id)->get()->map(
                fn($item) => ['product_id' => $item->product_id, 'quantity' => $item->quantity]
            );
        } else {
            return self::getCookieCartItems();
        }
    }

    public static function getCookieCartItems()
    {
        $request = \request();

        return json_decode($request->cookie('cart_items','[]'),true);
    }

    public static function getCountFromItems($cartItems)
    {
        return array_reduce(
            $cartItems,
            fn($carry, $item) => $carry + $item['quantity'],
            0
        );
    }

    public static function getCountAndTotalFromItems($cartItems)
    {
        return array_reduce(
            $cartItems,
            function ($carry, $item) {
                return [
                    'count' => $carry['count'] + $item['quantity'],
                    'total' => $carry['total'] + ( $item['quantity'] * $item['price'] )
                ];
            },
            ['count' => 0, 'total' => 0]
        );
    }

    public static function moveCartItemsIntoDb()
    {
        $request = \request();
        $cartItems = self::getCookieCartItems();
        $dbCartItems = CartItem::where(['user_id' => $request->user()->id])->get()->keyBy('product_id');
        $newCartItems = [];
        foreach ($cartItems as $cartItem) {
            if (isset($dbCartItems[$cartItem['product_id']])) {
                continue;
            }
            $newCartItems[] = [
                'user_id' => $request->user()->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
            ];
        }

        if (!empty($newCartItems)) {
            CartItem::insert($newCartItems);
        }
    }

    /**
     * @return array
     */
    public static function getProductsAndCartItems(): array
    {
        $cartItems = self::getCartItems();
        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::query()->whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        return [$products, $cartItems];
    }
}

