<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\LineItem;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Pacewdd\Bx\_5bx;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    public function index()
    {
   
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        }
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }
        $user = Auth::user();
    
        
        $address = $user->address;
    
        if (!$address) {

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
            'HST' => 0
        ];

        // Calculate taxes based on the user's province
        $gst = $subtotal * $taxRates['GST'];
        $pst = 0;
        $hst = $subtotal * $taxRates['HST'];
        $userProvince = Auth::user()->province ?? 'default'; // Fallback to a default if province is not set

        if (array_key_exists($userProvince, $taxRates['PST'])) {
            $pst = $subtotal * $taxRates['PST'][$userProvince];
        }
        $total = $subtotal + $gst + $pst;

        $categories = Category::all();

        // Include $address in the compact function
        return view('checkout', compact('cart', 'subtotal', 'gst', 'pst', 'hst', 'total', 'userProvince', 'address', 'categories'));
    }

        public function store(Request $request)
        {
            $taxRates = [
                'GST' => 0.05,
                'PST' => [
                    'BC' => 0.07, 
                    'ON' => 0.08,
                    
                ],
                'HST' => 0
            ];

            $cart = session('cart', []);
            $subtotal = array_sum(array_map(function($item) {
                return $item['quantity'] * $item['price'];
            }, $cart));

            $gst = $subtotal * $taxRates['GST'];
            $pst = 0;
            $hst = $subtotal * $taxRates['HST'];
            $userProvince = Auth::user()->province ?? 'default'; // Fallback to a default if province is not set

            if (array_key_exists($userProvince, $taxRates['PST'])) {
                $pst = $subtotal * $taxRates['PST'][$userProvince];
            }
            $total = $subtotal + $gst + $pst;

            $address_info = Address::where('user_id', Auth::user()->id)->first();

            $billing_address = [
                'address' => $address_info['address'],
                'city' => $address_info['city'],
                'province' => $address_info['province'],
                'postal_code' => $address_info['postal_code'],
            ];

            if($_POST['address']){
              $valid_address=$request->validate([
                'address' => 'required|string|min:1|max:255',
                'city' => 'required|string|min:1|max:255',
                'province' => 'required',
                'postal_code' => 'required|string|min:1|max:255',
              ]);
            }

            $valid=$request->validate([
                'name_on_card' => 'required|string|min:1|max:255',
                'card_number' => 'required|integer|digits:16',
                'month' => 'required|integer|min:01|max:12|digits:2',
                'year' => 'required|integer|min:23|max:50|digits:2',
                'cvv' => 'required|integer|digits:3',
                'card_type' => ['required', Rule::in(['visa', 'mastercard', 'amex'])]
            ]);

            if($_POST['address']){
                $order_info = [
                    'user_id' => Auth::user()->id,
                    'subtotal' => $subtotal,
                    'total' => $total,
                    'billing_address' => json_encode($billing_address),
                    'shipping_address' => json_encode($valid_address),
                    'pst' => $pst,
                    'gst' => $gst,
                    'hst' => $hst,
                    'status' => 0
                ];
            }else{
                $order_info = [
                    'user_id' => Auth::user()->id,
                    'subtotal' => $subtotal,
                    'total' => $total,
                    'billing_address' => json_encode($billing_address),
                    'pst' => $pst,
                    'gst' => $gst,
                    'hst' => $hst,
                    'status' => 0
                ];
            }

            $order = Order::create($order_info);

            $order->save();

            $new_order = Order::where('user_id', Auth::user()->id)->orderBy('updated_at')->first();

            $transaction = new _5bx(env('BX_LOGIN_ID'), env('BX_API_KEY'));
            $transaction->amount($order_info['total']);
            $transaction->card_num($valid['card_number']);
            $transaction->exp_date ($valid['month'] . $valid['year']);
            $transaction->cvv($valid['cvv']);
            $transaction->ref_num($new_order['id']);
            $transaction->card_type($valid['card_type']);

            dd($transaction);

            $response = $transaction->authorize_and_capture();

            var_dump($response);
            die;

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