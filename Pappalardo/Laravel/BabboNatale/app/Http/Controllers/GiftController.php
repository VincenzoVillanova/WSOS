<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Kid;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gift = Gift::all();
        $kid = Kid::all();
        return view('gift.list', compact('gift', 'kid'));
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
        $gift = new Gift();
        $gift->kid_id = request('kid_id');
        $gift->name = request('name');
        $gift->status = request('status');
        $gift->save();
        return redirect('gift');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gift $gift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gift $gift)
    {
        $kid = Kid::all();
        return view('gift.edit', compact('gift', 'kid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gift $gift)
    {
        $gift->kid_id = request('kid_id');
        $gift->name = request('name');
        $gift->status = request('status');
        $gift->save();
        return redirect('gift');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();
        return redirect('gift');
    }
}
