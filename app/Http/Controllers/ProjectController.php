<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    public function create() {
        $clients = Client::all();
        $users = User::all();

        return view('project.create', ['clients' => $clients, 'consultants' => $users]);
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_id' => 'required|integer',
        ]);
    
        Project::create($validated);
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        return view('project.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_id' => 'required|integer',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projeto deletado com sucesso!');
    }
}
