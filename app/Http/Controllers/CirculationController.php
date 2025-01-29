<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Circulation;

class CirculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch circulations with related book and user data
        $circulations = Circulation::with(['book', 'user'])->get();

        return view('CIRCULATION', compact('circulations'));
    }


    public function index2()
    {
        // Fetch circulations with related book and user data
        $circulations = Circulation::with(['book', 'user'])->get();

        return view('circulations.index', compact('circulations'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::all(); // Assuming User model represents customers
        $books = Book::all();

        return view('Circulation.Check-out', compact('customers', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'customer' => 'required|exists:users,id', 
            'book' => 'required|exists:books,id',
            'borrowed_date' => 'required|date',
            'due_date' => 'required|date|after:borrowed_date',
            'copies_borrowed' => 'required|integer|min:1',
        ]);

        // Find the book to check availability
        $book = Book::findOrFail($request->book);

        if ($book->copies < $request->copies_borrowed) {
            return back()->with('error', 'Not enough copies available for this book.');
        }

        // Create a new circulation record
        $circulation = Circulation::create([
            'user_id' => $request->customer,
            'book_id' => $request->book,
            'borrowed_date' => $request->borrowed_date,
            'due_date' => $request->due_date,
            'copies_borrowed' => $request->copies_borrowed,
            'status' => 'borrowed', // Default status
        ]);

        // Reduce the available copies in the books table
        $book->decrement('copies', $request->copies_borrowed);

        return redirect()->route('circulations.index')->with('success', 'Circulation record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Load circulation along with related book and user
        $circulation = Circulation::with(['book', 'user'])->findOrFail($id);

        return view('circulation.edit', compact('circulation'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateCirculation(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'circulationId' => 'required|exists:circulations,id',
            'returndate' => 'required|date',
            'status' => 'required|in:borrowed,returned,overdue,cancelled'
        ]);

        $circulation = Circulation::find(intval($request->circulationId));
        $circulation->returned_date = $request->returndate;
        $circulation->status = $request->status;
        $updated = $circulation->save();

        if ($updated) {
            return redirect()->route('view.circulation')->with('success', 'Circulation updated successfully!');
        } else {
            return redirect()->route('view.circulation')->with('error', 'Failed to update circulation.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
