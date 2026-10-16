<?php

namespace Database\Factories;

use App\Models\Ator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ator>
 */
class AtorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'nacionalidade' => fake()->country(),
            'data_nascimento' => fake()->date(),
        ];
    }
}
