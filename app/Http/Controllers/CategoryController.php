<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;

        $category->save();

        return redirect(route('categories.index'))->with('msg', 'Categoria "' . $category->name . '" adicionada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) 
    {
        // $this->authorize('update');

        $category = Category::findOrFail($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request) 
    {
        $data = $request->all();

        $category = Category::findOrFail($request->id);

        $category->update($data);

        return redirect(route('categories.index'))->with('msg', 'Categoria "' . $category->name . '" atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect(route('categories.index'))->with('msg', 'Categoria "' . $category->name . '" excluída com sucesso');
    }
}
