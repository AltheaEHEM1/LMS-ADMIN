<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circulation;
use App\Models\Book;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getChartData()
    {
        // Example: Count books issued each month
        $booksIssued = Circulation::selectRaw('MONTH(borrowed_date) as month, COUNT(*) as count')
            ->whereYear('borrowed_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count');

        // Fill missing months with 0
        $issuedData = array_fill(0, 12, 0);
        foreach ($booksIssued as $index => $count) {
            $issuedData[$index] = $count;
        }

        // Example: Count books circulated each month
        $booksCirculated = Circulation::selectRaw('MONTH(returned_date) as month, COUNT(*) as count')
            ->whereYear('returned_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count');

        $circulatedData = array_fill(0, 12, 0);
        foreach ($booksCirculated as $index => $count) {
            $circulatedData[$index] = $count;
        }

        // Example: Count overdue books per weekday
        $overdueBooks = Circulation::selectRaw('DAYOFWEEK(due_date) as day, COUNT(*) as count')
            ->where('status', 'overdue')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('count');

        return response()->json([
            'booksIssued' => $issuedData,
            'booksCirculated' => $circulatedData,
            'overdueBooks' => $overdueBooks
        ]);
    }
}
