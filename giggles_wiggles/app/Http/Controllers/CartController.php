<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); 
       
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

    
        if (isset($cart[$productId])) {
         
            $cart[$productId]['quantity'] += $quantity;
        } else {
            
            $cart[$productId] = [
                "name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $product->price
            ];
        }

    
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }


    public function showCart()
    {
       
        $cart = session()->get('cart', []);

        
      
        $totalPrice = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));
    
      
        return view('cart', ['cart' => $cart, 'totalPrice' => $totalPrice] );
    }
    
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Your cart has been cleared.');
    }

}