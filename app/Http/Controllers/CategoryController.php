<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category', ['categories' => $categories]);

    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        //display error if same category name
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',

        ]);

        $categories = Category::create($request->all());
        return redirect('category')->with('status', 'New category added successfully');
    }

    public function edit($slug)
    {
        $categories = Category::where('slug', $slug)->first();

        return view('category-edit', ['categories' => $categories]);
    }

    public function update(Request $request, $slug)
    {
        //display error if same category name
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',

        ]);

        $categories = Category::where('slug', $slug)->first();
        $categories->slug = null; //to sync update slug column when updating category name
        $categories->update($request->all());
        return redirect('category')->with('status', 'Category updated successfully');
    }

    public function delete($slug)
    {
        $categories = Category::where('slug', $slug)->first();
        return view('category-delete', ['categories' => $categories]);
        
    }

    public function destroy($slug)
    {
        $categories = Category::where('slug', $slug)->first();
        $categories->delete();
        return redirect('category')->with('status', 'Category deleted successfully');
    }

    public function deleted()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }

    public function restore($slug)
    {
        $categories = Category::withTrashed()->where('slug', $slug)->first();
        $categories->restore();
        return redirect('category')->with('status', 'Category has been restored');
    }
}
