<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class DeleteTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $team = Team::first();

        $response = $this->delete(route('teams.destroy', $team));

        $response->assertStatus(200);
    }
}
