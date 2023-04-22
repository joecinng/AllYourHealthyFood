<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'headings' => 'Featured Products',
            // latest()->get(): return the latest sorted products
            'products' => Product::latest()->filter(request(['search']))->get()
        ]);    
    }

    public function search(Product $id)
    {
        return view('products.show', [
            'product' => $id
        ]);
    }
}
