<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['nome' => 'Pipoca Grande', 'categoria' => 'Pipoca', 'preco' => 25.00],
            ['nome' => 'Pipoca Média', 'categoria' => 'Pipoca', 'preco' => 20.00],
            ['nome' => 'Refrigerante 500ml', 'categoria' => 'Bebida', 'preco' => 12.00],
            ['nome' => 'Água Mineral', 'categoria' => 'Bebida', 'preco' => 7.00],
            ['nome' => 'Chocolate', 'categoria' => 'Doce', 'preco' => 10.00],
            ['nome' => 'Combo Casal', 'categoria' => 'Combo', 'preco' => 55.00],
        ];

        foreach ($dados as $item) {
            Produto::create($item);
        }
    }
}
