<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Psy\Readline\Hoa\Console;

class CartController extends Controller
{
    public function store (Request $request)
    {
        $product = Product::findOrFail($request->input(key:'product_id'));
        Cart::add($product->id, $product->name, $request->input(key:'quantity'), $product->price, $product->weight);
        return redirect()->route('product.index')->with('message', 'Successfully added!');
    }

    public function index ()
    {
        return view('components.cart', [
            'cart' => Cart::content()
        ]);
    }

    public function update (Request $request)
    {
        $product = Product::findOrFail($request->input(key:'product_id'));
        Cart::update($product->id, ['quantity' => $request->input(key:'qty')]);
        return redirect()->route('product.index')->with('message', 'Successfully saved your cart!');
    }

    public function destroy (Request $request)
    {
        $product = Product::findOrFail($request->input(key:'product_id'));
        return redirect()->route('components.cart')->with('message', 'Successfully added!');
    }
}