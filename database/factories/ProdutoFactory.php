<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produto>
 */
class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->words(2, true),
            'categoria' => fake()->randomElement(['Pipoca', 'Bebida', 'Doce', 'Combo']),
            'preco' => fake()->randomFloat(2, 5, 40),
        ];
    }
}
