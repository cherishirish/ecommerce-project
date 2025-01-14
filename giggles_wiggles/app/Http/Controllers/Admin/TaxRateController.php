<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxRate;

class TaxRateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        $title = "Tax Rates";
        $tax_list = TaxRate::all();
        return view('admin/tax-rates/index', compact('tax_list', 'title'));
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
        $tax_item = TaxRate::where('id', '=', $id)->first();
        $title = 'Edit Tax Rate for: ' . $tax_item->province;
        return view('admin/tax-rates/edit', compact('title', 'tax_item'));
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
            'value_added' => 'required|numeric'
        ]);
        $tax_item = \App\Models\TaxRate::find($valid['id']);
        $tax_item->update($valid);
        return redirect(route('admin.tax-rates'))->with('success', 'Tax Rate created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
