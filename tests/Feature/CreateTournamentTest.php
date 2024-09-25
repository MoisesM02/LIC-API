<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTournamentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
    public function test_example(): void
    {
        $response = $this->post(route('tournaments.store'), [
            'name' => $this->faker->words(2, true),
            'Prize' => $this->faker->randomFloat(2)
        ]);

        $response->assertStatus(200);
    }
}
