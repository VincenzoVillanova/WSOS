<?php

namespace App\Http\Controllers;

use App\Models\Genere;
use Illuminate\Http\Request;

class GenereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genere = Genere::all();
        return view('genere.list', compact('genere'));
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
        $genere = new Genere();
        $genere->name = request('name');
        $genere->save();
        return redirect('/genere');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genere $genere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genere $genere)
    {
        return view('genere.edit', compact('genere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genere $genere)
    {
        $genere->name = request('name');
        $genere->save();
        return redirect('/genere');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genere $genere)
    {
        $genere->delete();
        return redirect('/genere');
    }
}
