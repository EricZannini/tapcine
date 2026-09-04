<?php

namespace Database\Factories;

use App\Models\Ficha;
use App\Models\Filme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ficha>
 */
class FichaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'filme_id' => Filme::factory(),
            'diretor' => fake()->name(),
            'ano' => (string) fake()->numberBetween(1980, 2026),
            'sinopse' => fake()->sentence(12),
        ];
    }
}
