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

    public function edit(Request $request) 
    {
        $task = Task::findOrFail($request->id);

        return view('task.edit', compact('task'));
    }

    public function update(Request $request) 
    {
        $data = $request->all();

        $task = Task::findOrFail($request->id);

        $task->update($data);

        if ($task->completed) {
            $msg = 'Atividade "' . $task->title . '" finalizada com sucesso';
        }
        else {
            $msg = 'Atividade "' . $task->title . '" atualizada com sucesso';
        }

        return redirect(route('project.show', $task->project_id))->with('msg', $msg);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect(route('project.show', $task->project_id))->with('msg', 'Atividade "' . $task->title . '" excluída com sucesso');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task.show', compact('task'));
    }
}
