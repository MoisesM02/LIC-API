<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FMatch;

class EditMatchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $match = FMatch::latest()->first();
        $response = $this->patch(route('matches.update', 2), [
            'away_id' => 24,
            'home_id' => 25,
            'away_score' => 4,
            'home_score' => 2,
            'tournament_id' => 5,
        ]);

        $response->assertStatus(200);
    }
}
