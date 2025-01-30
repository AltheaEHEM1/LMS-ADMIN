<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        // Retrieve all categories with the count of books associated with each
        $categories = Category::withCount('books')->get();

        // Pass the categories (with book counts) to a view
        return view('Catalog.CATALOG-ADDCATEGORIES', compact('categories'));
    }


    public function index2()
    {
        // Retrieve all categories
        $categories = Category::all();

        // Pass the categories to a view
        return view('Catalog.CATALOG-ADDBOOK', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Match field name
        ]);

        // Handle file upload
        $photoPath = null;
        if ($request->hasFile('picture')) { // Ensure field matches database column
            $photoPath = $request->file('picture')->store('categories', 'public'); // Save in storage/app/public/categories
        }

        // Create category
        Category::create([
            'name' => $request->name,
            'picture' => $photoPath, // Save file path
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Category added successfully!');
    }


    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Max 2MB
        ]);

        // Find category
        $category = Category::findOrFail($id);

        // Update category name
        $category->name = $request->name;

        // Handle file upload if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($category->picture) {
                Storage::disk('public')->delete($category->picture);
            }
            // Store new photo
            $category->picture = $request->file('photo')->store('categories', 'public');
        }

        // Save changes
        $category->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->picture) {
            Storage::disk('public')->delete($category->picture);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    




}
