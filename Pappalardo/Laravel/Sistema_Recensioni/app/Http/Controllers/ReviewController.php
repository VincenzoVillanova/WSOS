<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();
        $experience = Experience::all();
        return view('review.list', compact('review', 'experience'));
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
        $review = new Review();
        $review->experience_id = request('experience_id');
        $review->user = request('user');
        $review->rating = request('rating');
        $review->comment = request('comment');
        $review->save();
        return redirect('/review');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $experience = Experience::all();
        return view('review.edit', compact('review', 'experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->experience_id = request('experience_id');
        $review->user = request('user');
        $review->rating = request('rating');
        $review->comment = request('comment');
        $review->save();
        return redirect('/review');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect('/review');
    }
}
