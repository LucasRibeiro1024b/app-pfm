<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\progress;

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
    
    public function store(ProjectRequest $request) {
        $project = new Project();

        $project->title = $request->title;
        $project->description = $request->description;
        $project->client_id = $request->client_id;
        $project->end_date = $request->end_date;
        $project->status = $request->status;
        $project->value = $request->value;
        
        $project->save();

        $project->consultants()->sync($request->input('consultants'));

        return redirect()->route('projects.index')->with('msg', 'Projeto criado com sucesso!');
    }

    public function show($id) 
    {
        $project = Project::findOrFail($id);

        $tasks_all = Task::where('project_id', $project->id)->count();
        $tasks_completed = Task::where('project_id', $project->id)->where('completed', 1)->count();

        if ($tasks_all > 0) {
            $progress = ($tasks_completed / $tasks_all) * 100;
        }
        else {
            $progress = 100;
        }

        $progress = number_format($progress, 2);

        return view('project.show', compact('project', 'progress'));
    }

    public function edit($id)
    {
        $clients = Client::all();
        $users = User::where("type", 1)->get();

        $project = Project::findOrFail($id);
        return view('project.edit', ['project' => $project, 'clients' => $clients, 'consultants' => $users]);
    }

    public function update(ProjectRequest $request, $id)
    {

        $new_data = $request->all();
        // Remove the 'consultants' field from the data array
        unset($new_data['consultants']);

        $project = Project::findOrFail($id);
        $project->update($new_data);

        $project->consultants()->sync($request->input('consultants'));

        return redirect()->route('project.show', $id)->with('msg', 'Projeto atualizado com sucesso!');
        // return redirect()->route('project.show', $id);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('msg', 'Projeto deletado com sucesso!');
    }

}