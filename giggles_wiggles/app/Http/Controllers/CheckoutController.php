<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\LineItem;
use App\Models\Address;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Pacewdd\Bx\_5bx;
use Illuminate\Validation\Rule;
use Session;

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

            return redirect()->route('cart.show')->with('error', 'Please update your address.');
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

            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Please login to place an order.');
            }
    
            $user = Auth::user();
            $cart = session('cart', []);
    
            if (empty($cart)) {
                return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
            }

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

            if(!session()->has('order')){
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
    
                Session::put('order', $order->id);

            }else{
                $order = Order::where('id', session()->get('order'))->first();
            }

            $transaction = new _5bx(env('BX_LOGIN_ID'), env('BX_API_KEY'));
            $transaction->amount($order['total']);
            $transaction->card_num($valid['card_number']);
            $transaction->exp_date ($valid['month'] . $valid['year']);
            $transaction->cvv($valid['cvv']);
            $transaction->ref_num($order['id']);
            $transaction->card_type($valid['card_type']);

            $response = $transaction->authorize_and_capture();

            $cvv_error = '';
            $cc_error = '';

            if(!empty($response->transaction_response->errors->cvv_result) && empty($response->transaction_response->errors->cc_result)){
               $cvv_error = $response->transaction_response->errors->cvv_result;
               return redirect(route('checkout.index'))->with('danger', $cvv_error);
            }

            if(!empty($response->transaction_response->errors->cc_result) && empty($response->transaction_response->errors->cvv_result)){
                $cc_error = $response->transaction_response->errors->cc_result;
                return redirect(route('checkout.index'))->with('danger', $cc_error);
             }

            if(!empty($response->transaction_response->errors->cc_result) && !empty($response->transaction_response->errors->cvv_result)){
                $cvv_error = $response->transaction_response->errors->cvv_result;
                $cc_error = $response->transaction_response->errors->cc_result;
                return redirect(route('checkout.index'))->with('danger', "$cc_error and $cvv_error");
            }

            $transaction = (array)$transaction;

            $transaction_info = [
                'order_id' => $order->id,
                'status' => $response->transaction_response->response_code,
                'transaction' => json_encode($transaction)
            ];

            $transaction = Transaction::create($transaction_info);

            die;
    
                foreach ($cart as $item) {
                    $lineItem = new LineItem();
                    $lineItem->order_id = $order->id;
                    $lineItem->product_id = $item['id'];
                    $lineItem->unit_price = $item['price'];
                    $lineItem->name = $item['name']; // Assuming you have a name field
                    $lineItem->quantity = $item['quantity'];
                    $lineItem->save();
                }

    
                session()->forget('cart');
    
                return redirect()->route('order.confirmation', $order->id)
                                 ->with('success', 'Order placed successfully!');
        
        }
    
        private function calculateSubtotal($cart)
        {
            return array_reduce($cart, function ($total, $item) {
                return $total + ($item['quantity'] * $item['price']);
            }, 0);
        }
    

}