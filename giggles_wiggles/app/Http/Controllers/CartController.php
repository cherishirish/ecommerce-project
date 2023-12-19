<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{

    /**
     * add item to cart
     *
     * @param Request $request
     * @return redirect
     */
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
                "product_id" => $product->id,
                "name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $product->price
            ];
        }

    
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * show view with cart and list items
     *
     * @return view
     */
    public function showCart()
    {  
        $cart = session()->get('cart', []);
      
        $totalPrice = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        $categories = Category::all();
      
        return view('cart', ['cart' => $cart, 'totalPrice' => $totalPrice] );
    }

    /**
     * Empty contents of cart
     *
     * @return redirect
     */
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Your cart has been cleared.');
    }

    /**
     * Remove single item from cart
     *
     * @param [type] $productId
     * @return redirect
     */
    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);
        // dd($productId, $cart);
        if(isset($cart[$productId])){
            $product_name = $cart[$productId]['name'];
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->route('cart.show')->with('success', $product_name . ' has been removed from your cart.');
        }else{
            return redirect()->route('cart.show')->with('error', 'Item does not in your cart.');
        }
    }

}