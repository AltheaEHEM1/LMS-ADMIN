<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'media_type' => 'required|string|max:255',
            'category'   => 'required|string|max:255',
            'title'      => 'required|string|max:255',
            'isbn'       => 'required|string|max:255',
            'isbn_13'    => 'required|string|max:255',
            'edition'    => 'required|string|max:255',
            'year'       => 'required|string|max:4',
            'tag'        => 'nullable|string|max:255',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload for the photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create a new book record
        Book::create([
            'media_type' => $request->input('media_type'),
            'category'   => $request->input('category'),
            'title'      => $request->input('title'),
            'isbn'       => $request->input('isbn'),
            'isbn_13'    => $request->input('isbn_13'),
            'edition'    => $request->input('edition'),
            'year'       => $request->input('year'),
            'tag'        => $request->input('tag'),
            'photo'      => $photoPath,
            'created_by' => Auth::id(), // Assign the currently authenticated user as the creator
        ]);

        // Redirect to a specific page with a success message
        return redirect()->route('book.index')->with('success', 'Book created successfully.');
    }


    public function showCatalog()
    {
        $books = Book::all(); // Fetch all books from the database
        return view('/CATALOG', compact('books')); // Pass books to the view
    }

}
