<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart
{

    public static function new(Product $product, Request $request)
    {
        if (session()->has('cart')){
            $cart = self::getItems();
        }

        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $request->get('quantity')
        ];

        session()->put([
            'cart' => $cart
        ]);

        $cart['total_items'] = Cart::totalItems();
        $cart['total_amount'] = Cart::totalAmount();

        session()->put([
            'cart' => $cart
        ]);
    }


    public static function totalAmount()
    {
        $totalAmount = 0;

        foreach (self::getItems() as $cartItem) {

            if(is_array($cartItem) && array_key_exists('product', $cartItem) && array_key_exists('quantity', $cartItem)){

                $totalAmount += $cartItem['product']->cost_with_discount * $cartItem['quantity'];

            }

        }

        return $totalAmount;
    }

    public static function getItems()
    {
        return collect(self::getCart())->filter(function ($item){
            return is_array($item);
        });
    }

    public static function totalItems()
    {
        $items = self::getItems();

        return count($items);
    }

    public static function getCart()
    {
        if (!session()->has('cart')){
            return null;
        }
        return session()->get('cart');
    }

    public static function remove(Product $product)
    {
        if (session()->has('cart')){
            $cart = self::getItems();
            session()->forget('cart');
        }

        $cart->forget($product->id);

        session()->put([
            'cart' => $cart
        ]);

        $cart['total_amount'] = self::totalAmount();
        $cart['total_items'] = self::totalItems();

        session()->put([
            'cart' => $cart
        ]);
    }

    public static function removeAll()
    {
        session()->forget('cart');
    }

}
