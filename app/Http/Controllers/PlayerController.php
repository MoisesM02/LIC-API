<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $players = Player::with('team')->get();
        return $players;
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
            'last_name' => "required|string|max:60",
            'country' => 'required|string|max:100',
            'team_id' => 'required|integer',
        ]);

        $player = new Player;
        $player->name = $request->input('name');
        $player->last_name = $request->input('last_name');
        $player->country = $request->input('country');
        $player->team_id = $request->input('team_id');
        $player->save();

        return "Player record created successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
        return $player->with('team')->find($player->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'last_name' => "required|string|max:60",
            'country' => 'required|string|max:100',
            'team_id' => 'required|integer',
        ]);

        $player->update($validated);
        return("Player record updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
        if($player->delete())
            return response()->json(['message' => "Player deleted successfully"]);
        else
            return response()->json(['message' => "Couldn't delete player"], 500);
    }
}
