<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use EasyPost\EasyPostClient;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function index()
    {
        if(auth()->check()) 
        {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

            $totalamount = 0;
            $cart = Cart::content();
            $lineItems = [];
            foreach($cart as $product)
            {
                $totalamount += ($product->price * $product->qty);
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'aud',
                        'product_data' => [
                            'name' => $product->name
                        ],
                        'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => $product->qty,
                ];
            }

            $session = $stripe->checkout->sessions->create([
                'shipping_address_collection' => ['allowed_countries' => ['AU']],
                'shipping_options' => [
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => [
                                'amount' => 700,
                                'currency' => 'aud',
                            ],
                            'display_name' => 'Default shipping',
                            'delivery_estimate' => [
                                'minimum' => [
                                    'unit' => 'business_day',
                                    'value' => 5,
                                ],
                                'maximum' => [
                                    'unit' => 'business_day',
                                    'value' => 7,
                                ],
                            ],
                        ],
                    ],
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => [
                                'amount' => 1500,
                                'currency' => 'aud',
                            ],
                            'display_name' => 'Next day air',
                            'delivery_estimate' => [
                                'minimum' => [
                                    'unit' => 'business_day',
                                    'value' => 1,
                                ],
                                'maximum' => [
                                    'unit' => 'business_day',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success',[$totalamount], true)."?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('cart.index', [], true)
            ]);
            return redirect($session->url);
        } 
        else 
        {
            return redirect()->route('login');
        }
    }

    public function success(Request $request, $param)
    {
        $total = $param;

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->status = 'paid';
        $order->total_amount = $total;
        $order->save();

        $cart = Cart::content();
        foreach($cart as $product)
        {
            $orderdetails = new OrderDetails();
            $orderdetails->order_id = $order->id;
            $orderdetails->product_id = $product->id;
            $orderdetails->qty = $product->qty;
            $orderdetails->subtotal = ($product->price * $product->qty);
            $orderdetails->save();

            // update product stock
            $product_found = Product::findOrFail($product->id);
            $product_found->stock = $product_found->stock - $product->qty;
            $product_found->save();
        }

        $client = new EasyPostClient(env('EASYPOST_API_KEY'));

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $sessionId = $request->get('session_id');

        $session = $stripe->checkout->sessions->retrieve($sessionId);

        if (!$session) {
            throw new NotFoundHttpException;
        }

        $shipping_det = $session->shipping_details;

        date_default_timezone_set('Australia/Melbourne');

        $tracker = $client->tracker->create([
            'tracking_code' => 'EZ1000000001',
            'carrier' => 'AustraliaPost'
        ]);
        
        return view('products.checkout-success', ["url"=>$tracker->public_url]);
    }
}
