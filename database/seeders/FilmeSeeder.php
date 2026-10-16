<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filme;

class FilmeSeeder extends Seeder
{
    public function run(): void
    {
        $filmes = [
            ['titulo' => 'Super Mario Galaxy O Filme', 'genero' => 'Ação e Aventura', 'duracao' => '1h39', 'classificacao' => '6+', 'nota' => 8.2],
            ['titulo' => 'Crepúsculo (Relançamento)', 'genero' => 'Fantasia e Romance', 'duracao' => '2h02', 'classificacao' => '12+', 'nota' => 6.5],
            ['titulo' => 'Cara de Um, Focinho de Outro', 'genero' => 'Animação, Aventura e Comédia', 'duracao' => '1h45', 'classificacao' => '6+', 'nota' => 7.0],
            ['titulo' => 'Pânico 7', 'genero' => 'Terror e Mistério', 'duracao' => '1h54', 'classificacao' => '18+', 'nota' => 7.8],
            ['titulo' => 'Devoradores de Estrelas', 'genero' => 'Ação e Aventura', 'duracao' => '2h02', 'classificacao' => '12+', 'nota' => 8.0],
            ['titulo' => 'Velhos Bandidos', 'genero' => 'Policial, Ação e Comédia', 'duracao' => '1h33', 'classificacao' => '14+', 'nota' => 7.3],
            ['titulo' => 'Backrooms', 'genero' => 'Terror', 'duracao' => '1h50', 'classificacao' => '16+', 'nota' => 6.9],
            ['titulo' => 'Scarface', 'genero' => 'Ação e Aventura', 'duracao' => '2h50', 'classificacao' => '18+', 'nota' => 9.2],
            ['titulo' => 'Todo Mundo em Pânico 6', 'genero' => 'Comédia', 'duracao' => '1h35', 'classificacao' => '18+', 'nota' => 6.0],
            ['titulo' => 'Dia D', 'genero' => 'Suspense', 'duracao' => '2h30', 'classificacao' => '12+', 'nota' => 7.5],
            ['titulo' => 'Vingadores', 'genero' => 'Ação e Aventura', 'duracao' => '2h30', 'classificacao' => '14+', 'nota' => 9.0],
            ['titulo' => 'Vingadores 3', 'genero' => 'Super-Herói', 'duracao' => '1h30', 'classificacao' => '12+', 'nota' => 8.7],
        ];

        foreach ($filmes as $filme) {
            Filme::create($filme);
        }
    }
}
