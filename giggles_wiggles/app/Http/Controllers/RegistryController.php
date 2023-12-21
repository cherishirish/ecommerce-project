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

    $isDefault = $request->has('is_default') ? 1 : 0;
   
    if ($isDefault) {
        Auth::user()->registries()->update(['is_default' => false]);
    }
    $registry = Registry::create([
        'user_id' => Auth::id(),
        'registryName' => $request->registryName,
        'eventDate' => $request->eventDate,
        'product_ids' => json_encode($request->product_ids ?? []),
        'is_default' => 1
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
        $productIds = json_decode($registry->product_ids, true);
        $products = Product::whereIn('id', $productIds)->get();

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
        $request->validate([
            'registryName' => 'required|string|max:255',
            'eventDate' => 'required|date',
        ]);
    
        $registry = Registry::find($id);
        $registry->registryName = $request->input('registryName');
        $registry->eventDate = $request->input('eventDate');

        // Only save fields that are being updated
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
        $title = "Registry - " . config('app.name');
        $registry = Registry::findOrFail($id);
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
    
        $registry = collect();
    
        if ($searchTerm) {
            $parts = explode('-', $searchTerm);
            if (isset($parts[1])) {
                $originalId = intval($parts[1]);
                $registry = Registry::where('id', $originalId)->get();
            }
        }
        
        return view('search-registry', compact('registry', 'searchTerm', 'title'));
    }
    
    



         // -------------------------------------------------------------------------------------------------------------


         public function add(Request $request, $productId)
            {
                $user = Auth::user();

                $registries = $user->registries;
                if ($registries->isEmpty()) {
                    return redirect()->route('registry.create')
                        ->with('danger', 'You don\'t have a registry. Create one now!');
                }

                $defaultRegistry = $user->registries()->where('is_default', true)->first();
                if (!$defaultRegistry) {
                    return redirect()->route('manage')
                        ->with('danger', 'You don\'t have a default registry. Set one now!');
                }
                
                

                // Decode the current product_ids array
                // add and encode back
                $productIds = json_decode($defaultRegistry->product_ids, true) ?? [];
                if (!in_array($productId, $productIds)) {
                    $productIds[] = $productId;
                }
                $defaultRegistry->product_ids = json_encode($productIds);
                $defaultRegistry->save();

                return redirect()->back()->with('success', 'Product added to default registry!');
            }

         
            public function setDefault($registryId)
            {
                $user = Auth::user();
                
                $user->registries()->update(['is_default' => false]);
                $user->registries()->where('id', $registryId)->update(['is_default' => true]);

                return redirect()->back()->with('success', 'Default registry updated!');
            }

            
    }
    
    
