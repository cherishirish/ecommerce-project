<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource
     *
     * @return view
     */
    public function index()
    {
        $title = "Category";
        $category = Category::all();
        return view('admin/categories/index', compact('title', 'category'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return view
     */
    public function create()
    {
        $title = "Create Category";
        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in database
     *
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
    $request->validate([
        'category_name' => 'required|string|max:255',
        'is_nav' => 'required|boolean',
    ]);

    Category::create($request->all());

    return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }   

    /**
     * Edit a resource
     *
     * @param [type] $id
     * @return view
     */
    public function edit($id)
    {
        $title = "Edit Category";
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('title','category'));
    }

    /**
     * Update a resource
     *
     * @param Request $request
     * @return redirect
     */
    public function update(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'category_name' => 'required|string|max:255',
            'is_nav' => 'required|boolean',
        ]);

        $category = Category::find($valid['id']);

        // Check if the data has been modified
        if ($category->category_name != $valid['category_name'] || $category->is_nav != $valid['is_nav']) {
            // Data has been modified, update the record
            $category->update($valid);

            // Set a success flash message
            return redirect(route('admin.categories'))->with('success', 'Category updated successfully.');
        } else {
            // No changes were made, set a flash message
            return redirect(route('admin.categories.edit', ['id' => $valid['id']]))->with('info', 'There were no changes made.');
        }
    }

    /**
     * Delete a resource
     *
     * @param [type] $id
     * @return redirect
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }

    public function search(Request $request)
    {
        $title = "Categories";
        $search = $request->input('search');
        $category = Category::where('category_name', 'LIKE', '%' . $search . '%')
        ->orWhere('is_nav', 'LIKE', '%' . $search . '%')->get();

        return view('admin/categories/index', compact('title', 'category'));
    }

}
