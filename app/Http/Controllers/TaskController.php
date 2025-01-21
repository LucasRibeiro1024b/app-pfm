<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request) 
    {
        $project = Project::findOrFail($request->project_id);
        return view('task.create', compact('project'));
    }
}
