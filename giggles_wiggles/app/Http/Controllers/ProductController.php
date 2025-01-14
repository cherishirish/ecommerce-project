<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index(Request $request)
    {
        $categoryName = '';
        $categories = Category::all();
        $category_id = $request->input('category_id', null);


        if ($category_id) {
            $products = Product::where('category_id', $category_id)
            ->where('availability', 1)
            ->get();
            $category = Category::find($category_id);
            $categoryName = $category ? $category->category_name : '';
            $title = ucfirst($categoryName);
        } else {
            $title = 'All Products';
            $products = Product::where('availability', 1)->get();
        }
    
        $sortOption = $request->input('sort');

        if ($category_id) {
            $query = Product::where('category_id', $category_id)->where('availability', 1);
        } else {
            $query = Product::where('availability', 1);
        }

        switch ($sortOption) {
            case 'name_asc':
                $query->orderBy('product_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('product_name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'brand':
                // Assuming you have a 'brand_name' field in your 'brands' table
                $query->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->orderBy('brands.brand_name', 'asc');
                break;
        }

        $products = $query->get();

        return view('product.index', compact('products', 'title', 'categoryName', 'category_id', 'categories'));
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
     * @return view
     */
    public function show($id)
    {
        // $title = "";
        $product = Product::with('category', 'brand')->find($id); // Use 'category' relationship
        $title = $product->category->category_name;
        $categories = Category::all();

        if (!$product) {
            abort(404);
        }

        $categoryName = $product->category ? $product->category->category_name : '';
        $productName = $product->product_name;
        $title = $productName;

        return view('product.show', compact('title', 'product', 'categoryName', 'productName','categories'));
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

    /**
     * Search for product
     *
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $results = Product::where('product_name', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
                  ->get();

        return view('product.index', compact('results'));
        
    }
    
}
