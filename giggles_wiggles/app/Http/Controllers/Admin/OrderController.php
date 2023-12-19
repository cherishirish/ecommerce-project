<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\LineItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        $title = "Orders";
        $orders = Order::with('user', 'lineItems')->latest()->paginate(12);
        return view('admin/orders/index', compact('title', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @return view
     */
    public function edit(string $id)
    {
        $order = Order::where('id', '=', $id)->first();
        $title = 'Edit Order: ' . $order->id;
        return view('admin/orders/edit', compact('title', 'order'));
    }

    /**
     * Update the specified resource in storage.
     * @return redirect
     */
    public function update(Request $request)
    {
        $valid =$request->validate([
            'id' => 'required|integer',
            'pst' => 'required|numeric',
            'gst' => 'required|numeric',
            'hst' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'billing_address' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'status' => 'required|numeric',
        ]);
        $order = \App\Models\Order::find($valid['id']);
        $order->update($valid);
        return redirect(route('admin.orders'))->with('success', 'Order Info created successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @return redirect
     */
    public function destroy(string $id)
    {
        $order = \App\Models\Order::find($id);
        $line_items = \App\Models\LineItem::where('order_id', $id);
        $order->delete();
        $line_items->delete();
        return redirect(route('admin.orders'))->with('success', 'Order deleted successfully'); 
    }
}
