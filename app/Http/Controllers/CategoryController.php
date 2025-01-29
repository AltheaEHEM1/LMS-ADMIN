<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
}
