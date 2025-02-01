<?php

namespace App\Http\Controllers;

use App\Models\league;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leghe = league::all();
        return view("league.list", compact("leghe"));
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
        $league = new league();
        $league->description = request("description");
        $league->link = request("link");
        $league->save();
        return redirect("/leghe");
    }

    /**
     * Display the specified resource.
     */
    public function show(league $league)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(league $league)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, league $league)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(league $league)
    {
        $league->delete();
        return redirect("/leghe");
    }
}
