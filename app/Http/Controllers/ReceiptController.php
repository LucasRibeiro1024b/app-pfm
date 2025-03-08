<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
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
    
        return view('receipt.create', compact('projects', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReceiptRequest $request)
    {
        Receipt::create($request->validated());

        return redirect()->route('finance.index')->with('msg', 'Receita criada com sucesso!');
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
        $clients = Client::all();
        $projects = Project::all();

        $receipt = Receipt::findOrFail($id);
        return view('receipt.edit', ['receipt' => $receipt, 'clients' => $clients, 'projects' => $projects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReceiptRequest $request, string $id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->update($request->validated());

        return redirect()->route('finance.index', $id)->with('msg', 'Receita atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();

        return redirect()->route('finance.index')->with('msg', 'Receita deletada com sucesso!');
    }
}
