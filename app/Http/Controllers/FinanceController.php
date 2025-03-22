<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Receipt;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FinanceController extends Controller
{
    

public function index()
{
    // Fetch data from both tables with eager loading
    $receipts = Receipt::with('project')->get();
    $expenses = Expense::all();

    // Add a 'type' attribute to each record
    $receipts = $receipts->map(function ($receipt) {
        $receipt->type = 'Receita';
        return $receipt;
    });

    $expenses = $expenses->map(function ($expense) {
        $expense->type = 'Despesa';
        return $expense;
    });

    // Combine the collections
    $finances = $receipts->concat($expenses);

    // Sort by date (optional)
    $finances = $finances->sortByDesc('created_at');

    // Paginate the results manually
    $currentPage = request()->input('page', 1);
    $perPage = 8;
    $currentItems = $finances->slice(($currentPage - 1) * $perPage, $perPage)->values();
    $finances = new LengthAwarePaginator($currentItems, $finances->count(), $perPage, $currentPage, [
        'path' => request()->url(),
        'query' => request()->query(),
    ]);

    // Pass paginated data to the view
    return view('finance.index', compact('finances'));
}

}
