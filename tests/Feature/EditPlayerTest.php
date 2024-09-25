<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;

class EditPlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        //Esta forma toma el último jugador de la base de datos y lo modifica, asignándole un nombre y país aleatorio
        // $player = Player::latest()->first();
        // $response = $this->patch(route('players.update', $player),[
        //     'name' => fake()->firstName(),
        //     'last_name' => fake()->lastName(),
        //     'country' => fake()->country(),
        //     'team_id' => $player->team_id,
        // ]);

        //Esta forma se le inyecta el modelo a la ruta a través de Route Model Binding, donde solo se le pasa el id a la ruta
        $response = $this->patch(route('players.update', 1) ,[
            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'country' => fake()->country(),
            'team_id' => 10,
        ]);

        $response->assertStatus(200);
    }
}
