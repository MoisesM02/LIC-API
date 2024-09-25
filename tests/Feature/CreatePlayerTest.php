<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class CreatePlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
    public function test_example(): void
    {
        $team = Team::latest()->first();
        $response = $this->post(route('players.store'),[
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'country' => $this->faker->country(),
            'team_id' => $team->id,
        ]);

        $response->assertStatus(200);
    }
}
