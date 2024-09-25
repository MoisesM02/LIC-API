<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class CreateTeamsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post(route('teams.store'),[
            'name' => "Barcelona",
            'league' => 'La Liga',
        ]);

        $response->assertStatus(200);
    }
}
