<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        $title = "Brands";
        $brands = Brand::all();
        return view('admin/brands/index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $title = "Create new brand";
        return view('admin/brands/edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
        $valid =$request->validate([
            'brand_name' => 'required|string|min:1|max:255',
        ]);
        Brand::create($valid);
        return redirect(route('admin.brands'))->with('success', 'Brand created successfully');
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
     *
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $brand = Brand::where('id', '=', $id)->first();
        $title = 'Edit Brand';
        return view('admin/brands/edit', compact('title', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return redirect
     */
    public function update(Request $request)
    {
        $valid =$request->validate([
            'id' => 'required|integer',
            'brand_name' => 'required|string|min:1|max:255',
        ]);
        $brand = Brand::find($valid['id']);
        $brand->update($valid);
        return redirect(route('admin.brands'))->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return redirect
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect(route('admin.brands'))->with('success', 'Brand deleted successfully');
    }

    public function search(Request $request)
    {
        $title = "Brands";
        $search = $request->input('search');
        $brands = Brand::where('brand_name', 'LIKE', '%' . $search . '%')->get();

        return view('admin/brands/index', compact('title', 'brands'));
    }
}
