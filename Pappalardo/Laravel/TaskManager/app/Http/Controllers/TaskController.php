<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\task;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = task::all();
        $project = Project::all();
        return view('task.list', compact('task', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new task();
        $task->project_id = request('project_id');
        $task->title = request('title');
        $task->description = request('description');
        $task->date = request('date');
        $task->completed = request('completed');
        $task->save();
        return redirect('/task');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        $project = Project::all();
        return view('/task.edit', compact('task', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        $task->project_id = request('project_id');
        $task->title = request('title');
        $task->description = request('description');
        $task->date = request('date');
        $task->completed = request('completed');
        $task->save();
        return redirect('/task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $task->delete();
        redirect('/task');
    }
}
