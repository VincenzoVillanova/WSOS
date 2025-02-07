<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genere;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genere = Genere::all();
        $film = Film::all();
        return view('film.list', compact('film', 'genere'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $film = new Film();
        $film->name = request('name');
        $film->author = request('author');
        $film->year = request('year');
        $film->genere_id = request('genere_id');
        $film->save();
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genere = Genere::all();
        return view('film.edit', compact('film', 'genere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $film->name = request('name');
        $film->author = request('author');
        $film->year = request('year');
        $film->genere_id = request('genere_id');
        $film->save();
        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect('/film');
    }
}
