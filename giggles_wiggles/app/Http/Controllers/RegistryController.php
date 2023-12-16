<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Registry;
use App\Models\User;


class RegistryController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Registry';
        $registry = Registry::all();
        return view('registry/index', compact('title', 'registry'));
    }
    public function manage(Request $request)
    {
        $title = 'Manage Registry';
        $registries = Registry::where('user_id', Auth::id())->get();
        return view('/manage', compact('title','registries'));
    }

    public function create()
    {
        $title = 'Create Registry';
        $products = Product::all();  
        return view('registry/create', compact('title', 'products'));
    }


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

    return redirect()->route('/manage')->with('success', 'Registry created successfully!');
    }   


    public function edit($id)
                {
    $title = 'Edit Registry';
    $registry = Registry::where('user_id', Auth::id())->findOrFail($id);
    $products = Product::all();  

    return view('registry.edit', compact('title', 'products', 'registry'));
    }




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
    

    public function show($id)
    {
        $title = "Registry";
        $registry = Registry::find($id);
        $productIds = json_decode($registry->product_ids, true);

        $products = Product::whereIn('id', $productIds)->get();

        return view('registry.show', compact('registry', 'products', 'title'));
    }

    public function destroy($id)
    {
        $registry = Registry::find($id);
        $registry->delete();
        return redirect()->route('manage')->with('success', 'Registry deleted successfully!');
    }

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


}