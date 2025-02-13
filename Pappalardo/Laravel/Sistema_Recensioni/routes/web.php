<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ReviewController;
use App\Models\Experience;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/review/api/filterByCost', function (Request $request) {
    $experience = Experience::whereBetween('price', [$request->min, $request->max])->get();

    return view('experience.list', compact('experience'));
});

Route::resource('/experience', ExperienceController::class);
Route::resource('/review', ReviewController::class);
