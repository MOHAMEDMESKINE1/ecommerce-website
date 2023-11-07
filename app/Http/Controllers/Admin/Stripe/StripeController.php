<?php

namespace App\Http\Controllers\Admin\Stripe;

use Stripe\Stripe;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    public function session(Request $request){
        
        $cart = session()->get('cart');

        // Ensure there are items in the cart
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Initialize line_items array
        $lineItems = [];
        // Loop through items in the cart and add them to line_items
        foreach ($cart as $itemId => $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'USD',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount'  => round($item['price'] * 100), // Convert individual item price to cents
                ],
                'quantity'   => $item['quantity'],
            ];
        }
        
        // Set up the Stripe Checkout session
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'success_url' => route('success'),
        ]);

        return redirect()->away($session->url);
    }
    public function success()
    {

        return redirect()->route('index')->with('success',"Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible");

    }
}
