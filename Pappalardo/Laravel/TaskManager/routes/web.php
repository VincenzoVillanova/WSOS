<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Project;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/task/api/serchByProject', function (Request $request) {
    $id = request('id');
    $task = task::where('project_id', $id)->get();
    $project = Project::all();
    return view('task.list', compact('task', 'project'));
});

Route::resource('/project', ProjectController::class);
Route::resource('/task', TaskController::class);
