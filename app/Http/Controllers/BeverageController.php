<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Models\Category;
class BeverageController extends Controller
{
    public function index()
    {
        $beverages = Beverage::all();
        return view('admin.beverages', compact('beverages'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.addBeverage', compact('categories'));
    }
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|string',
        'content' => 'string',
        'price' => 'numeric',
        'category_id' => 'required|exists:categories,id',
        'special' => 'boolean',
        'beverage_date' => 'nullable|date',
        // Add validation rules for other fields as needed
    ]);

    // Set a default value for 'published'
    $validatedData['published'] = $request->has('published') ? true : false;

    // Create a new Beverage instance and save it to the database
    Beverage::create($validatedData);

    // Redirect back with a success message or to the beverages list
    return redirect()->route('admin.beverages')->with('success', 'Beverage added successfully!');
}

public function edit($id)
    {
        // Find the beverage by id
        $beverage = Beverage::findOrFail($id);
        $categories = Category::all();

        // Return the view with the beverage data
        return view('admin.editBeverage', compact('beverage', 'categories'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'special' => 'boolean',
            'published' => 'boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // assuming 'image' is the name of the file input
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the beverage record
        $beverage = Beverage::findOrFail($id);
        $beverage->update($validatedData);

        // Redirect back to the beverages list with a success message
        return redirect()->route('admin.beverages')->with('success', 'Beverage updated successfully.');
    }
    public function destroy($id)
    {
        try {
            $beverage = Beverage::findOrFail($id);
            $beverage->delete();
            return redirect()->route('admin.beverages')->with('success', 'Beverage deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete beverage: ' . $e->getMessage());
        }
    }
    
}
