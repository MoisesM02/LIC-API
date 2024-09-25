<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class EditTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $team = Team::latest()->first();
        $response = $this->patch(route('teams.update', $team),[
            "name" => "Atlético de Madrid",
            "league" => "La Liga"
        ]);

        $response->assertStatus(200);
    }
}
