<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\KidController;
use App\Models\Gift;
use App\Models\Kid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/kid/api/allGood', function () {
    $kid = Kid::all();
    foreach ($kid as $item) {
        $item->good = true;
        $item->save();
    }

    $gift = Gift::all();
    foreach ($gift as $item) {
        $item->status = true;
        $item->save();
    }
    return redirect('/kid');
});

Route::get('/kid/api/allNoGood', function () {
    $kid = Kid::all();
    foreach ($kid as $item) {
        $item->good = false;
        $item->save();
    }

    $gift = Gift::all();
    foreach ($gift as $item) {
        $item->status = false;
        $item->save();
    }
    return redirect('/kid');
});

Route::get('/gift/api/deleteAnnullati', function () {
    Gift::where('status', false)->delete();
    return redirect('/gift');
});

Route::get('/kid/api/deleteCattivi', function () {
    Kid::where('good', false)->delete();
    return redirect('/kid');
});
Route::resource('/kid', KidController::class);
Route::resource('/gift', GiftController::class);
