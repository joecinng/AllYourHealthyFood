<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    static public function index()
    {
        return view('products.index', [
            'headings' => 'Featured Products',
            // latest()->get(): return the latest sorted products
            'products' => Product::latest()->filter(request(['search']))->get(),
            'cart' => Cart::content()
        ]);  
    }

    public function search(Product $id)
    {
        return view('products.show', [
            'product' => $id
        ]);
    }
}
