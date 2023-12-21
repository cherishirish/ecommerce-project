<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Order;
use App\Models\Address;
use App\Models\User;
use App\Models\Brand;
use App\Models\LineItem;
use App\Models\Registry;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{

    /**
     * Display home page
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request) {
        $title = "";
        $category_id = $request->input('category_id');
        $registry = Registry::all();
        
        // Fetch categories before checking category_id
        $categories = Category::all();
    
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
            $category = Category::find($category_id);
            $categoryName = $category ? $category->category_name : '';
        } else {
            $products = Product::all();
            $categoryName = ''; 
        }

        $deals = Product::orderBy('price', 'ASC')->limit(8)->get();
        $brands = Brand::all();

        return view('/home', compact('title', 'category_id', 'products', 'categoryName', 'categories', 'deals', 'brands', 'registry'));
    }
    
    /**
     * Show about page
     *
     * @return view
     */
    function about() {
        $title = "About Us";
        $categories = Category::all();
        return view('/about', compact('title', 'categories'));
    }

    /**
     * Show contact page
     *
     * @return view
     */
    function contact() {
        $title = "Contact Us";
        $categories = Category::all();
        return view('/contact', compact('title', 'categories'));
    }

    /**
     * Store new contact request
     *
     * @param Request $request
     * @return redirect
     */
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

        return redirect()->route('page.contact.success')->with('contact_id', $contact->id)->withInput();
    }
    
    /**
     * Show success page for contact
     *
     * @return view
     */
    public function success()
    {
        $categories = Category::all();
        return view('success', compact('categories'));
    }

    /**
     * show profile page
     *
     * @return view
     */
    public function profile() {
        if(Auth::check()){
            $title = "Profile";
            $categories = Category::all();
            $orders = Order::where('user_id', auth()->id())->get();
            $address = Address::all();
            return view('/profile', compact('title', 'categories', 'orders', 'address'));
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * display form/page for editing user
     *
     * @return view
     */
    public function profileEdit()
    {
        $title = "Edit Profile";
        $categories = Category::all();
        $user = Auth::user();
        return view('profile_edit', compact('title', 'categories','user'));
    }

    /**
     * Update user information in database
     *
     * @param Request $request
     * @return redirect
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user = Auth::user();
        
        // Update user details
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('page.profile')->with('success', 'Profile changes updated successfully.');
    }

    /**
     * display form for updating shipping address
     *
     * @return view
     */
    public function ShippingAddressEdit()
    {
        $title = "Edit Shipping Address";
        $user = Auth::user();
        $categories = Category::all();
        return view('shippingaddress_edit', compact('title','categories'));
    }
   
    /**
     * update user shipping address in database
     *
     * @param Request $request
     * @return redirect
     */
    public function updateShippingAddress(Request $request)
    {
        // Validate the request data
        $request->validate([
            'address' => 'required|string|max:255',
            'postal_code' => 'required|regex:/^[A-Za-z]\d[A-Za-z]\s?\d[A-Za-z]\d$/',
            'city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        ]);

        $user = auth()->user();

        // Update or create shipping address
        $user->address()->updateOrCreate(
            ['address_type' => 'shipping'],
            [
                'address' => $request->input('address'),
                'postal_code' => $request->input('postal_code'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
            ]
        );

        return redirect()->route('page.profile')->with('success', 'Shipping Address updated successfully.');
    }

    /**
     * delete shipping address
     *
     * @return redirect
     */
    public function deleteShippingAddress()
    {
        $user = Auth::user();
        $user->shippingAddress()->delete();

        return redirect()->route('page.profile')->with('success', 'Shipping Address deleted successfully.');
    }

    /**
     * Show form to edit billing address
     *
     * @return view
     */
    public function BillingAddressEdit()
    {
        $title = "Edit Billing Address";
        $user = Auth::user();
        $categories = Category::all();
        return view('billingaddress_edit', compact('title','categories'));
    }
   
    /**
     * Update billing address in database
     *
     * @param Request $request
     * @return redirect
     */
    public function updateBillingAddress(Request $request)
    {
        // Validate the request data
        $request->validate([
            'address' => 'required|string|max:255',
            'postal_code' => 'required|regex:/^[A-Za-z]\d[A-Za-z]\s?\d[A-Za-z]\d$/',
            'city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        ]);

        $user = auth()->user();

        // Update or create billing address
        $user->address()->updateOrCreate(
            ['address_type' => 'billing'],
            [
                'address' => $request->input('address'),
                'postal_code' => $request->input('postal_code'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
            ]
        );

        return redirect()->route('page.profile')->with('success', 'Billing Address updated successfully.');
    }

    /**
     * Delete user billing address
     *
     * @return redirect
     */
    public function deleteBillingAddress()
    {
        $user = Auth::user();
        $user->billingAddress()->delete();

        return redirect()->route('page.profile')->with('success', 'Billing Address deleted successfully.');
    }

    /**
     * Display invoice after purchase
     *
     * @return view
     */
    public function invoice()
    {
        $title = "Your Invoice";
        $categories = Category::all();
        $user = Auth::user();
        $orders = Order::where('user_id', auth()->id())->get();

        $lineItems = LineItem::whereIn('order_id', $orders->pluck('id'))->get();

        $address = Address::all();

        return view('/invoice', compact('title', 'categories', 'user', 'orders', 'lineItems', 'address'));
    }

    /**
     * Display gift registry page
     *
     * @return view
     */
    function registry() {
        $title = "Gift Registry";
        $categories = Category::all();
        return view('/registry', compact('title', 'categories'));
    }
}
