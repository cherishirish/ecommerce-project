<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Registry;
use App\Models\User;


class RegistryController extends Controller
{
    /**
     * Display registry start page
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $title = 'Registry';
        $registry = Registry::all();
        return view('registry/index', compact('title', 'registry'));
    }

    /**
     * Display page for managing registry
     *
     * @param Request $request
     * @return view
     */
    public function manage(Request $request)
    {
        $userId = Auth::id();
        $title = 'Manage Registry';
        $registries = Registry::where('user_id', $userId)->get();
        return view('/manage', compact('title','registries','userId'));
    }

    /**
     * Show form to create a new registry
     *
     * @return view
     */
    public function create()
    {
        $title = 'Create Registry';
        $userId = Auth::id();   

        $user = User::findOrFail($userId);
        
        $products = Product::all();  
        return view('registry/create', compact('title', 'products' ,'user'));
    }

    /**
     * Store new registry information in database
     *
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
    $request->validate([
        'registryName' => 'required|string|max:255',
        'eventDate' => 'required|date',
        'product_ids' => 'nullable|array',
        'product_ids.*' => 'exists:products,id'
    ]);

    $registry = Registry::create([
        'user_id' => Auth::id(),
        'registryName' => $request->registryName,
        'eventDate' => $request->eventDate,
        'product_ids' => json_encode($request->product_ids ?? [])
    ]);

    return redirect()->route('manage')->with('success', 'Registry created successfully!');
    }   


    /**
     * Show form to edit registry
     *
     * @param [type] $id
     * @return view
     */
    public function edit($id)
    {
        $title = 'Edit Registry';
        $registry = Registry::where('user_id', Auth::id())->findOrFail($id);
        $selectedProductIds = json_decode($registry->product_ids, true);
        $products = Product::all()->sortBy(function($product) use ($selectedProductIds) {
            return !in_array($product->id, $selectedProductIds);
        });

        return view('registry.edit', compact('title', 'products', 'registry'));
    }

    /**
     * Update registry in database
     *
     * @param Request $request
     * @param [type] $id
     * @return redirect
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'registryName' => 'required|string|max:255',
            'eventDate' => 'required|date',
            'product_ids' => 'nullable|array',
            'product_ids.*' => 'exists:products,id'
        ]);
    
        $registry = Registry::find($id);
        $registry->update([
            'registryName' => $request->registryName,
            'eventDate' => $request->eventDate,
            'product_ids' => json_encode($request->product_ids ?? [])
        ]);

        $registry->save();
    
        return redirect()->route('manage')->with('success', 'Registry updated successfully!');
    }
    

    /**
     * Show list of user's registry items
     *
     * @param [type] $id
     * @return view
     */
    public function show($id)
    {
        $title = "Registry";
        $registry = Registry::find($id);
        $productIds = json_decode($registry->product_ids, true);

        $productIds = json_decode($registry->product_ids, true);
        $products = Product::whereIn('id', $productIds)->get();
    
        return view('registry.show', compact('registry', 'products', 'title'));
    }

    /**
     * Delete registry
     *
     * @param [type] $id
     * @return redirect
     */
    public function destroy($id)
    {
        $registry = Registry::find($id);
        $registry->delete();
        return redirect()->route('manage')->with('success', 'Registry deleted successfully!');
    }

    /**
     * remove product from registry
     *
     * @param Request $request
     * @param [type] $registryId
     * @return id
     */
    public function removeProduct(Request $request, $registryId)
    {
    $registry = Registry::findOrFail($registryId);
    $productId = $request->input('productId');

    $productIds = collect(json_decode($registry->product_ids, true));
    $productIds = $productIds->reject(function ($id) use ($productId) {
        return $id == $productId;
    });

    $registry->product_ids = json_encode($productIds->values()->all());
    $registry->save();

    return response()->json(['success' => 'Product removed successfully']);
    }


    public function showPublic($registryId)
    {   
        $title = "Registry";
        $registry = Registry::find($registryId);
        $productIds = json_decode($registry->product_ids, true);
        $products = Product::whereIn('id', $productIds)->get();
        $registry = Registry::findOrFail($registryId);
        return view('public', compact('registry', 'products', 'title'));
    }


    public function search(Request $request)
    {
         
        $title = "Registry";
        $searchTerm = $request->input('search');
       
        $registries = collect();
    
        if ($searchTerm) {
            $year = substr($searchTerm, 0, 4);
            $idWithPadding = substr($searchTerm, 4);
            $originalId = intval($idWithPadding); // Convert to integer to remove leading zeros
    
            

            $registries = Registry::where('id', $originalId)->get();
            
        }
    
        return view('search-registry', compact('registries', 'searchTerm', 'title'));
    }
    

}