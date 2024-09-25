<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Tournament::latest()->get();
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
            'name' => 'required|string|max:60',
            'Prize' => "required|decimal:2",
        ]);

        $tournament = new Tournament;
        $tournament->name = $request->input('name');
        //El dato del premio se multiplica por 100 para evitar problemas de aproximaciones con flotantes;
        $tournament->Prize = $request->input('Prize') * 100;
        $tournament->save();

        return "Tournament record created successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        //
        return $tournament->with('matches')->find($tournament->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'Prize' => "required|decimal:2",
        ]);


        $validated['Prize'] = $validated['Prize']* 100;

        $tournament->update($validated);
        return("Tournament record updated");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        //
        if($tournament->delete())
            return response()->json(['message' => "Tournament deleted successfully"]);
        else
            return response()->json(['message' => "Couldn't delete tournament"], 500);
    }
}
