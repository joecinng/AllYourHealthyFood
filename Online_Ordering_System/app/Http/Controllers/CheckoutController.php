<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            return view('components.checkout', [
                'cart' => Cart::content()
            ]);
        } else {
            return redirect()->route('login');
        }

    }
}
