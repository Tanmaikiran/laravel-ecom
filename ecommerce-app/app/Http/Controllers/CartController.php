<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $item = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
        ];

        $cart[] = $item;
        session()->put('cart', $cart);

        return redirect('/cart');
    }

    // Show cart items with total price
    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'price'));

        return view('cart', ['cart' => $cart, 'total' => $total]);
    }

    // Remove item from cart by index
    public function removeFromCart(Request $request)
    {
        $index = $request->input('index');
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // Re-index array
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }
}
