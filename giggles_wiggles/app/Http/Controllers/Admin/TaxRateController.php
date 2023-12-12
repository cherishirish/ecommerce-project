<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxRate;

class TaxRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Tax Rates";
        $tax_list = TaxRate::all();
        return view('admin/tax/index', compact('tax_list', 'title'));
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
     */
    public function edit(string $id)
    {
        $tax_item = TaxRate::where('id', '=', $id)->first();
        $title = 'Edit Tax Rate for ' . $tax_item->province;
        return view('admin/edit', compact('title', 'tax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid =$request->validate([
            'id' => 'required|integer',
            'gst' => 'required|numeric',
            'gst' => 'required|numeric',
            'hst' => 'required|numeric',
        ]);
        $tax_item = \App\Models\TaxRate::find($valid['id']);
        $tax_item->update($valid);
        return redirect(route('admin_tax_rates'))->with(['flash' => ['type' => 'success', 'message' => 'Tax Rate updated successfully!']]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
