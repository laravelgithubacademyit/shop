<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('client.cart.index', [
           'items' => Cart::getItems(),
           'totalAmount' => Cart::totalAmount(),
           'totalItems' => Cart::totalItems()
        ]);
    }

    public function store(Request $request, Product $product)
    {
        Cart::new($product, $request);

        return response([
            'msg' => 'successful',
            'cart' => Cart::getCart()
        ], 200);
    }

    public function destroy(Product $product)
    {
        Cart::remove($product);

        return response([
            'msg' => 'removed',
            'cart' => Cart::getCart()
        ], 200);
    }

}
