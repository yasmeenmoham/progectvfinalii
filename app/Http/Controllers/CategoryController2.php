<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController2 extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.addCategory');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create category
        Category::create($request->all());

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category
    public function edit(Category $category)
    {
        return view('admin.editCategory', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update category
        $category->update($request->all());

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database
   
    public function destroy(Category $category)
    {
        // Check if there are associated records in the beverages table
        if ($category->beverages->isEmpty()) {
            // No associated records, proceed with deletion
            $category->delete();
            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
        } else {
            // Associated records found, return with an error message
            return redirect()->route('admin.categories')->with('error', 'Cannot delete category because it has associated records in the beverages table.');
        }
    }
    public function show(Category $category)
{
    $products = $category->products;

    return view('category.products', compact('category', 'products'));
}
// CategoryController.php

public function showProducts(Category $category)
{
    $products = $category->products;

    return view('admin.products', compact('category', 'products'));
}

}

