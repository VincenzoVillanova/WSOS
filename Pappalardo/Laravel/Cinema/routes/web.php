<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenereController;
use App\Models\Film;
use App\Models\Genere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/genere/api/serchByGenere', function (Request $request) {
    $id = request('id');
    $genere = Genere::all();
    $film = Film::where('genere_id', $id)->get();
    return view('film.list', compact('film', 'genere'));
});

Route::get('/genere/api/incrementYear', function () {
    $genere = Genere::all();
    $film = Film::all();
    foreach ($film as $item) {
        $item->year = $item->year + 1;
        $item->save();
    }

    return redirect('/film');
});
/*
Stesso funzionamento di quello di sotto però meno esotico diciamo meno bellino
Route::post('/genere/api/deleteByGenere', function (Request $request) {
    $genere = Genere::all();
    $film = Film::where('genere_id', request('id'))->get();
    foreach ($film as $item) {
        $item->delete();
    }
    return redirect('/film');
});
*/

Route::post('/genere/api/deleteByGenere', function (Request $request) {
    $genere = Genere::all();
    $film = Film::where('genere_id', request('id'))->delete();
    return redirect('/film');
});

Route::resource('/genere', GenereController::class);
Route::resource('/film', FilmController::class);
