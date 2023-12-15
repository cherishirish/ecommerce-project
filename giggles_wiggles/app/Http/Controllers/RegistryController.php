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
        $registries = Registry::where('user_id', Auth::id())->get();
        return view('registry/index', compact('title','registries'));
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

    return redirect()->route('registry.index')->with('success', 'Registry created successfully!');
}   


        public function edit()
        {
            $title = 'Edit Registry';
            $registries = Registry::where('user_id', Auth::id())->get();
            return view('registry/create', compact('title', 'products'));
        }

        public function update(Request $request, $id)
        {
            $registry = Registry::findOrFail($id);
            // ... validation and other logic ...

            $registry->update([
                'registryName' => $request->registryName,
                'eventDate' => $request->eventDate,
                'product_ids' => json_encode($request->input('product_ids', [])),
            ]);
        }

}