<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/team/order', function () {
    $teams = Team::orderBy('point', 'desc')->get();
    return view('team.list', compact('teams'));
});

Route::get('/team/filterPoint', function () {
    $teams = Team::where('point', '>=', 45)->orderBy('point', 'desc')->get();
    return view('team.list', compact('teams'));
});

Route::get('/team/deletePoint', function () {
    $teams = Team::where('point', '<', 45)->delete();
    return redirect('/team');
});



Route::resource('/team', TeamController::class);
Route::resource('/player', PlayerController::class);
