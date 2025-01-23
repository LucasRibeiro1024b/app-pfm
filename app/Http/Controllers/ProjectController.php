<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('id', "DESC")->get();
        return view('project.index', compact('projects'));
    }

    public function create() {
        $clients = Client::all();
        $users = User::where("type", 1)->get();

        return view('project.create', ['clients' => $clients, 'consultants' => $users]);
    }
    
    public function store(Request $request) {
        $project = new Project();

        $project->title = $request->title;
        $project->description = $request->description;
        $project->client_id = $request->client_id;
        $project->end_date = $request->end_date;
        $project->status = $request->status;
        $project->value = $request->value;
        
        $project->save();

        return redirect()->route('projects.index')->with('msg', 'Projeto criado com sucesso!');
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
