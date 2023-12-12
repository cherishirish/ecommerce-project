<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\LineItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
   
        if (!Auth::check()) {
            return redirect()->route('login')->with('url.intended', route('checkout.index'));
        }
    
        $user = Auth::user();
    
        // Fetch the address associated with the user
        $address = $user->address;
    
        if (!$address) {
            // Handle the case where the user does not have an address
            // Redirect back or show a message to update the address
            return redirect()->route('some.route')->with('error', 'Please update your address.');
        }
    
        $province = $address->province;
        
        $cart = session('cart', []);

       
        $subtotal = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

     
        $taxRates = [
            'GST' => 0.05,
            'PST' => [
                'BC' => 0.07, 
                'ON' => 0.08,
                
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

        // Include $address in the compact function
        return view('checkout', compact('cart', 'subtotal', 'gst', 'pst', 'total', 'userProvince', 'address'));
    }

        public function placeOrder(Request $request)
        {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Please login to place an order.');
            }
    
            $user = Auth::user();
            $cart = session('cart', []);
    
            if (empty($cart)) {
                return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
            }
    
            DB::beginTransaction();
    
            try {
                $subtotal = $this->calculateSubtotal($cart);
                $gst = $subtotal * 0.05; // Assume 5% GST
                $pst = $subtotal * 0.07; // Assume 7% PST, adjust based on province
    
                $order = new Order();
                $order->customer_id = $user->id;
                $order->subtotal = $subtotal;
                $order->gst = $gst;
                $order->pst = $pst;
                $order->total = $subtotal + $gst + $pst;
                $order->billing_address = 'Your Billing Address'; // Retrieve from user or input
                $order->shipping_address = 'Your Shipping Address'; // Retrieve from user or input
                $order->status = 1; // Assuming 1 represents a specific status
                $order->save();
    
                foreach ($cart as $item) {
                    $lineItem = new LineItem();
                    $lineItem->order_id = $order->id;
                    $lineItem->product_id = $item['id'];
                    $lineItem->unit_price = $item['price'];
                    $lineItem->name = $item['name']; // Assuming you have a name field
                    $lineItem->quantity = $item['quantity'];
                    $lineItem->save();
                }
    
                DB::commit();
    
                session()->forget('cart');
    
                return redirect()->route('order.confirmation', $order->id)
                                 ->with('success', 'Order placed successfully!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('cart.show')->with('error', 'Error processing your order.');
            }
        }
    
        private function calculateSubtotal($cart)
        {
            return array_reduce($cart, function ($total, $item) {
                return $total + ($item['quantity'] * $item['price']);
            }, 0);
        }
    

}