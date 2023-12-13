<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Image;

class PageController extends Controller
{

    public function index(Request $request) {
        $title = "Home";
        $category_id = $request->input('category_id');
        
        // Fetch categories before checking category_id
        $categories = Category::all();
    
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
            $category = Category::find($category_id);
            $categoryName = $category ? $category->category_name : '';
        } else {
            $products = Product::all();
            $categoryName = ''; // Set a default value when not filtering by category
        }

        $deals = Product::orderBy('price', 'ASC')->limit(6)->get();

        // $image_one = Image::where('product_id', $deals[0]->id)->first('image');

        // $image_two = Image::where('product_id', $deals[1]->id)->first('image');

        // $image_three = Image::where('product_id', $deals[2]->id)->first('image');

        // $image_four = Image::where('product_id', $deals[3]->id)->first('image');

        // $image_five = Image::where('product_id', $deals[4]->id)->first('image');

        // $image_six = Image::where('product_id', $deals[5]->id)->first('image');
        //dd($categories);
        return view('/home', compact('title', 'category_id', 'products', 'categoryName', 'categories', 'deals'));
    }
    
    function about() {
        $title = "About Us";
        $categories = Category::all();
        return view('/about', compact('title', 'categories'));
    }

    function contact() {
        $title = "Contact Us";
        $categories = Category::all();
        return view('/contact', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        
        // Storing the data 
        $contact = Contact::create($valid);

        return redirect()->route('page.contact.success')->with('contact_id', $contact->id);
    }

    public function success()
    {
        $categories = Category::all();
        return view('success', compact('categories'));
    }


    function profile() {
        $title = "Profile";
        $categories = Category::all();
        return view('/profile', compact('title', 'categories'));
    }
}
