<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\WorkController;
use App\Models\Department;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/work/api/searchByDepartments', function (Request $request) {
    $id = request('id');
    $work = Work::where('department_id', $id)->get();
    $department = Department::all();
    return view('/work.list', compact('work', 'department'));
});

Route::resource('/department', DepartmentController::class);
Route::resource('/work', WorkController::class);
