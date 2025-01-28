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
            'title'      => 'required|string|max:255',
            'isbn'       => 'required|string|max:255',
            'isbn_13'    => 'required|string|max:255',
            'edition'    => 'required|string|max:255',
            'publishedyear' => 'required|string|max:12',
            'language'   => 'required|string|max:255',
            'pages'      => 'required|string|max:255',
            'publisher'  => 'required|string|max:255',
            'Author'     => 'required|string|max:255',
            'copies'     => 'required|integer|max:255',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            'categories' => 'array', // Ensure categories are passed as an array
        ]);

        // Handle file upload for the photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create a new book record
        $book = Book::create([
            'media_type' => $request->input('media_type'),
            'title'      => $request->input('title'),
            'isbn'       => $request->input('isbn'),
            'isbn_13'    => $request->input('isbn_13'),
            'edition'    => $request->input('edition'),
            'year'       => $request->input('publishedyear'),
            'language'   => $request->input('language'),
            'pages'      => $request->input('pages'),
            'publisher'  => $request->input('publisher'),
            'author'     => $request->input('Author'),
            'photo'      => $photoPath,
            'copies'     => $request->input('copies'),
            'created_by' => Auth::id(), // Assign the currently authenticated user as the creator
        ]);

        // Attach selected categories to the book
        if ($request->has('categories')) {
            $book->categories()->sync($request->input('categories'));
        }

        // Redirect to a specific page with a success message
        return redirect()->route('catalogs')->with('success', 'Book created successfully along with its categories.');
    }



    public function showCatalog()
    {
        $books = Book::all(); // Fetch all books from the database
        return view('/CATALOG', compact('books')); // Pass books to the view
    }

    public function addCopy(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'number_of_copies' => 'required|integer|min:1',
        ]);

        // Assign validated values to variables
        $recordId = intval($validated['book_id']);

        // Find the book by ID
        $book = Book::findOrFail($recordId);

        // Increment the copies field
        $book->copies += $validated['number_of_copies'];

        // Save the updated book record
        $book->save();

        // Redirect or respond with a success message
        return redirect()->back()->with('success', 'Copies added successfully!');
    }

}
