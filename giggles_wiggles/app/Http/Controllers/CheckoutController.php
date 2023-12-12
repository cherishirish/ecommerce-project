<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            // Redirect to login page with the intended URL to come back to checkout after login
            return redirect()->route('login')->with('url.intended', route('checkout.index'));
        }
        
        // Retrieve the cart from the session
        $cart = session('cart', []);

        // Calculate the subtotal
        $subtotal = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        // Define GST and PST rates
        $taxRates = [
            'GST' => 0.05, // Assuming GST is 5%
            'PST' => [
                'BC' => 0.07, // BC's PST
                'ON' => 0.08, // Ontario's PST
                // Other provinces...
            ],
        ];

        // Calculate taxes based on the user's province
        $gst = $subtotal * $taxRates['GST'];
        $pst = 0;
        $userProvince = Auth::user()->province ?? 'default'; // Fallback to a default if province is not set

        if (array_key_exists($userProvince, $taxRates['PST'])) {
            $pst = $subtotal * $taxRates['PST'][$userProvince];
        }

        $total = $subtotal + $gst + $pst;

        // Pass the cart, taxes, and totals to the view
        return view('checkout', compact('cart', 'subtotal', 'gst', 'pst', 'total', 'userProvince'));
    }
}