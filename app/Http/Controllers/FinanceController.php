<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Receipt;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        // Fetch data from both tables
        $receipts = Receipt::with('project')->get();
        $expenses = Expense::all();

        // Add a 'type' attribute to each record
        $receipts = $receipts->map(function ($receipt) {
            $receipt->type = 'Receita'; // Add type for receipts
            return $receipt;
        });

        $expenses = $expenses->map(function ($expense) {
            $expense->type = 'Despesa'; // Add type for expenses
            return $expense;
        });

        // Combine the collections
        $finances = $receipts->concat($expenses);

        // Sort by date (optional)
        $finances = $finances->sortByDesc('created_at');

        // Pass data to the view
        return view('finance.index', compact('finances'));
    }
}
