<?php

namespace App\Http\Controllers;

use App\Models\FMatch;
use Illuminate\Http\Request;

class FMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return FMatch::latest()->get();
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
        //
        $validated = $request->validate([
            'away_id' => 'required|integer',
            'home_id' => 'required|integer',
            'away_score' => 'required|integer',
            'home_score' => 'required|integer',
            'tournament_id' => 'required|integer',
        ]);

        $match = new FMatch;
        $match->away_id = $request->input('away_id');
        $match->home_id = $request->input('home_id');
        $match->away_score = $request->input('away_score');
        $match->home_score = $request->input('home_score');
        $match->tournament_id = $request->input('tournament_id');

        $match->save();

        return response()->json([
            'message' => 'Match record created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($fMatch)
    {
        //
        return FMatch::with('away_team')->with('home_team')->with('tournament')->find($fMatch);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FMatch $fMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fMatch)
    {
        //
        $validated = $request->validate([
            'away_id' => 'required|integer',
            'home_id' => 'required|integer',
            'away_score' => 'required|integer',
            'home_score' => 'required|integer',
            'tournament_id' => 'required|integer',
        ]);

        $match = FMatch::find($fMatch);

        $match->update($validated);

        return response()->json([
            'message' => 'Match updated succesfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fMatch)
    {
        //
        $match = FMatch::find($fMatch);
        if($match->delete())
            return response()->json(['message' => "Team deleted successfully"]);
        else
            return response()->json(['message' => "Couldn't delete team"], 500);
    }
}
