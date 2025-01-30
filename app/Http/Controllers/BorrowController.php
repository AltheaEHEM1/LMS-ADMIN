<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Circulation;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all borrows with related book and user
        $borrows = Borrow::with(['user', 'book'])->get();

        return view('RESERVATION', compact('borrows'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function updateBorrow(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'pickup_date' => 'nullable|date',
            'duedate' => 'nullable|date|after_or_equal:pickup_date',
            'status' => 'required|string|in:Approved,Denied,Circulated',
        ]);

        try {
            // Find the borrow record
            $borrow = Borrow::findOrFail($id);

            if ($request->input('status') === 'Approved') {
                // Update borrow details
                $borrow->update([
                    'pickup_date' => $request->input('pickup_date'),
                    'due_date' => $request->input('duedate'),
                    'status' => 'Approved',
                ]);
            } 
            elseif ($request->input('status') === 'Circulated') {
                DB::beginTransaction();
                
                $book = Book::findOrFail($borrow->book_id);
                $user = User::findOrFail($borrow->user_id);

                // Check if copies are available before proceeding
                if ($book->copies <= 0) {
                    return back()->with('error', 'No copies available for circulation.');
                }

                // Create circulation record
                Circulation::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'borrowed_date' => now()->format('Y-m-d'),
                    'due_date' => $request->input('duedate'),
                    'copies_borrowed' => 1,
                    'status' => 'borrowed', // Default status
                ]);

                // Reduce available copies
                $book->decrement('copies', 1);

                // Mark borrow as completed
                $borrow->update(['status' => 'Completed']);

                DB::commit();
            }

            return back()->with('success', 'Borrow record updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
