<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10); // Or adjust pagination as needed
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consultants = User::where("type", User::PARTNER)->get();

        return view('supplier.create', compact('consultants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        Supplier::create($request->validated());

        return redirect()->route('supplier.index')->with('msg', 'Fornecedor adicionado com sucesso!');
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
        $supplier = Supplier::findOrFail($id);
        $consultants = User::where("type", User::CONSULTANT)->get();

        return view('supplier.edit', ['supplier' => $supplier, 'consultants' => $consultants]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request)
    {
        $data = $request->all();

        $supplier = Supplier::findOrFail($request->id);

        $supplier->update($data);

        // Redirect to the supplier index with a success message
        return redirect()->route('supplier.index')->with('msg', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect(route('supplier.index'))->with('msg', 'Fornecedor "' . $supplier->name . '" excluído(a) com sucesso');
    }
}
