<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $page)
    {
        $title = 'All ' . ucfirst($page);

        $pageToCategory = [
            'apparel' => 1,
            'furniture' => 2,
            'toys' => 3,
            'bedding' => 4,
            'bathing' => 5,
            'gear' => 6,
        ];

        $category_id = $pageToCategory[$page] ?? 1;

        // Define a mapping of view names corresponding to each category
        $viewMapping = [
            1 => 'apparel',
            2 => 'furniture',
            3 => 'toys',
            4 => 'bedding',
            5 => 'bathing',
            6 => 'gear',
        ];

        $viewName = $viewMapping[$category_id] ?? 'apparel';

        $products = Product::where('category_id', $category_id)->get();

        return view($viewName . '.index', compact('products', 'title'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
