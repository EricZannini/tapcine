<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ficha;
use App\Models\Filme;

class FichaSeeder extends Seeder
{
    public function run(): void
    {
        // Uma ficha para cada um dos primeiros filmes (1:1)
        $filmes = Filme::orderBy('id')->take(3)->get();

        $dados = [
            ['diretor' => 'Aaron Horvath', 'ano' => '2023', 'sinopse' => 'O encanador Mario embarca em uma aventura pelo Reino dos Cogumelos.'],
            ['diretor' => 'Catherine Hardwicke', 'ano' => '2008', 'sinopse' => 'Uma jovem se apaixona por um vampiro em uma pequena cidade.'],
            ['diretor' => 'Roberto Santucci', 'ano' => '2023', 'sinopse' => 'Uma comédia sobre confusões e trocas inesperadas.'],
        ];

        foreach ($filmes as $i => $filme) {
            Ficha::create(array_merge(['filme_id' => $filme->id], $dados[$i]));
        }
    }
}
