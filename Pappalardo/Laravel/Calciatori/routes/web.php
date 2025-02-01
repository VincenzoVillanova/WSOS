<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/team/insert', function () {
    return view('team.insert');
});

Route::get('/player/insert', function () {
    $teams = Team::all();
    return view('player.insert', compact('teams'));
});

Route::resource('/team', TeamController::class);
Route::resource('/player', PlayerController::class);
