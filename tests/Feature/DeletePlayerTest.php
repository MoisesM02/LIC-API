<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;

class DeletePlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $player = Player::firstOrFail();

        $response = $this->delete(route('players.destroy', $player));

        $response->assertStatus(200);
    }
}
