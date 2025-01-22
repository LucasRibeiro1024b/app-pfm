<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request) 
    {
        $project = Project::findOrFail($request->project_id);
        return view('task.create', compact('project'));
    }

    public function store(Request $request)
    {
        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->value = $request->value;
        $task->predicted_hour = $request->predicted_hour;
        $task->project_id = $request->project_id;

        $task->save();

        return redirect(route('project.show', $task->project_id))->with('msg', 'Atividade "' . $task->title . '" adicionada com sucesso');
    }
}
