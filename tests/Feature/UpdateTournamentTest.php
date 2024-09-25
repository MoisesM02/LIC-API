<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tournament;

class UpdateTournamentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $tournament = Tournament::latest()->first();
        $response = $this->patch(route('tournaments.update', $tournament),[
            "name" => "Premiere League",
            "Prize" => "250000.00"
        ]);

        $response->assertStatus(200);
    }
}
