<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $players = Player::all();
        return view('player.list', compact('teams', 'players'));
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
        $player = new Player();
        $player->name = request('name');
        $player->age = request('age');
        $player->injured = request('injured');
        $player->team_id = request('team_id');
        $player->save();
        return redirect('/player');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('player.edit', compact('teams', 'player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $player->name = request('name');
        $player->age = request('age');
        $player->injured = request('injured');
        $player->team_id = request('team_id');
        $player->save();
        return redirect('/player');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect('/player');
    }
}
