<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = Team::with('players')->get();
        return $teams;
        // return csrf_token();

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
        //validate request
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'league' => 'required|string|max:60',
        ]);

        $team = new Team;
        $team->name = $request->input('name');
        $team->league = $request->input('league');
        $team->save();
        return('Team record created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
        $away = $team->matches_away;
        $home = $team->matches_home;
        return response()->json([
            'team' => $team->with('players')->find($team->id),
            'matches' => $away->merge($home)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'league' => 'required|string|max:60',
        ]);

        $team->update($validated);
        return("Team record updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
        if($team->delete())
            return response()->json(['message' => "Team deleted successfully"]);
        else
            return response()->json(['message' => "Couldn't delete team"], 500);
    }
}
