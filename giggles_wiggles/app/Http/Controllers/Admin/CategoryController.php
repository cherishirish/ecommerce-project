<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $title = "Create Category";
        $categories = Category::all();
        return view('admin/categories/index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = "Create Category";
        return view('admin.categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $title = "Edit Category";
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('title','category'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|integer',
            'category_name' => 'required|string|max:255',
        ]);

        $valid=$request->validate([
            'id' => 'required|integer',
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|email',
            'is_admin' => 'required'
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Check if the data has been modified
        if ($category->category_name != $request->input('category_name')) {
            // Data has been modified, update the record
            $category->update([
                'category_name' => $request->input('category_name'),
            ]);

            // Set a success flash message
            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        } else {
            // No changes were made, set a flash message
            return redirect()->route('admin.categories.edit', ['id' => $id])->with('info', 'There were no changes made.');
        }
    }

    
        

        
   

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }

}
