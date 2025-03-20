<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all(); // Fetch all projects
        $clients = Client::all(); // Fetch all clients
        $suppliers = Supplier::all();
        $categories = Category::all();
    
        return view('expense.create', compact('projects', 'clients', 'suppliers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        Expense::create($request->validated());

        // Redirect with a success message
        return redirect()->route('finance.index')->with('msg', 'Despesa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = Project::all();
        $clients = Client::all();
        $suppliers = Supplier::all();
        $categories = Category::all();

        $expense = Expense::findOrFail($id); 
    
        return view('expense.create', compact('expense', 'projects', 'clients', 'suppliers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, string $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->update($request->validated());

        // Redirect with a success message
        return redirect()->route('finance.index')->with('msg', 'Despesa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('finance.index')->with('msg', 'Despesa deletada com sucesso!');
    }
}
