<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\LineItem;
use App\Models\Address;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TaxRate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Pacewdd\Bx\_5bx;
use Illuminate\Validation\Rule;
use Session;
use Mail;


class CheckoutController extends Controller
{

    /**
     * Display checkout page
     *
     * @return view
     */
    public function index()
    {
   
        $title = "Checkout";
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        // }
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }
        $user = Auth::user();
        
        $cart = session('cart', []);

       
        $subtotal = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        // Calculate taxes based on the user's province
        $user = Auth::user();
        $cart = session('cart', []);
        $address = Address::where('id', $user->id)->where('address_type', 'billing')->first();
        $province = $address->province;
        $taxRates = TaxRate::where('province', $province)->first();
        $gst_rate = $taxRates->gst;
        $pst_rate = $taxRates->pst;
        $hst_rate = $taxRates->hst;


        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        // Calculate cart values

        $subtotal = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        $gst = $subtotal * $gst_rate;
        $pst = $subtotal * $pst_rate;
        $hst = $subtotal * $hst_rate;

        $total = $subtotal + $gst + $pst + $hst;
        
        $categories = Category::all();

        // Include $address in the compact function
        return view('checkout', compact('title', 'cart', 'subtotal', 'gst', 'pst', 'hst', 'gst_rate', 'pst_rate', 'hst_rate', 'total', 'province', 'address', 'categories'));
    }

    /**
     * Store order, transaction and address information in the database
     *
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $cart = session('cart', []);
        $address = Address::where('user_id', $user->id)->where('address_type', 'billing')->first();
        $province = $address->province;
        $taxRates = TaxRate::where('province', $province)->first();
        $gst_rate = $taxRates->gst;
        $pst_rate = $taxRates->pst;
        $hst_rate = $taxRates->hst;

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        $subtotal = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        $gst = $subtotal * $gst_rate;
        $pst = $subtotal * $pst_rate;
        $hst = $subtotal * $hst_rate;

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
            'card_number' => 'required|integer|digits_between:15,16',
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

        $transaction->save();

        $order->status = 1;            

        foreach ($cart as $item) {
            $lineItem = new LineItem();
            $lineItem->order_id = $order->id;
            $lineItem->product_id = $item['product_id'];
            $lineItem->unit_price = $item['price'];
            $lineItem->name = $item['name']; // Assuming you have a name field
            $lineItem->quantity = $item['quantity'];
            $lineItem->save();

            $product = Product::where('id', $item['product_id'])->first();
            $product->quantity = $product->quantity - $item['quantity'];

            if($product->quantity == 0){
                $product->availability = 0;
            }
        }


            return redirect()->route('checkout.email');
    
    }

    /**
     * Send user to confirmation page
     *
     * @return view
     */
    public function orderConfirm()
    {
        return view('order_confirmation');
    }

    /**
     * Calculate subtotal of cart
     *
     * @param [type] $cart
     * @return subtotal
     */
    private function calculateSubtotal($cart)
    {
        return array_reduce($cart, function ($total, $item) {
            return $total + ($item['quantity'] * $item['price']);
        }, 0);
    }

    /**
     * Send order confirmation email
     *
     * @return redirect
     */
    public function htmlmail()
{
    $template_path = 'email_template';
    $order = Order::where('id', session('order'))->first();
    $user = User::where('id', $order->user_id)->first();
    $cart = session('cart', []);
    $billing_address = json_decode($order->billing_address);

    // dd($billing_address->city);

    $data = [
        'order' => $order,
        'user' => $user,
        'cart' => $cart
    ];
    

    Mail::send($template_path, $data, function($message){
        $message->to('cheezbrgeryumm@gmail.com', 'Loresa Bueckert')->subject('Giggles Wiggles Order Confirmation');

        $message->from('lbwebdev@outlook.com', 'Giggles Wiggles');
    });

    session()->forget('cart');

    return redirect(route('order.confirmation'))->with('success', 'You order has been placed!');
}


}