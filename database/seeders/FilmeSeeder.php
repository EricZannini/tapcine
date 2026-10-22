<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Filme;

class FilmeSeeder extends Seeder
{
    public function run(): void
    {
        $filmes = [
            ['titulo' => 'Super Mario Galaxy O Filme', 'genero' => 'Ação e Aventura', 'duracao' => '1h39', 'classificacao' => '6+', 'nota' => 8.2, 'poster' => 'super-mario-galaxy.jpg'],
            ['titulo' => 'Crepúsculo (Relançamento)', 'genero' => 'Fantasia e Romance', 'duracao' => '2h02', 'classificacao' => '12+', 'nota' => 6.5, 'poster' => 'crepusculo.jpg'],
            ['titulo' => 'Cara de Um, Focinho de Outro', 'genero' => 'Animação, Aventura e Comédia', 'duracao' => '1h45', 'classificacao' => '6+', 'nota' => 7.0, 'poster' => 'cara-de-um-focinho-de-outro.jpg'],
            ['titulo' => 'Pânico 7', 'genero' => 'Terror e Mistério', 'duracao' => '1h54', 'classificacao' => '18+', 'nota' => 7.8, 'poster' => 'panico-7.jpg'],
            ['titulo' => 'Devoradores de Estrelas', 'genero' => 'Ação e Aventura', 'duracao' => '2h02', 'classificacao' => '12+', 'nota' => 8.0, 'poster' => 'devoradores-de-estrelas.jpg'],
            ['titulo' => 'Velhos Bandidos', 'genero' => 'Policial, Ação e Comédia', 'duracao' => '1h33', 'classificacao' => '14+', 'nota' => 7.3, 'poster' => 'velhos-bandidos.jpg'],
            ['titulo' => 'Backrooms', 'genero' => 'Terror', 'duracao' => '1h50', 'classificacao' => '16+', 'nota' => 6.9, 'poster' => 'backrooms.jpg'],
            ['titulo' => 'Scarface', 'genero' => 'Ação e Aventura', 'duracao' => '2h50', 'classificacao' => '18+', 'nota' => 9.2, 'poster' => 'scarface.jpg'],
            ['titulo' => 'Todo Mundo em Pânico 6', 'genero' => 'Comédia', 'duracao' => '1h35', 'classificacao' => '18+', 'nota' => 6.0, 'poster' => 'todo-mundo-em-panico-6.jpg'],
            ['titulo' => 'Dia D', 'genero' => 'Suspense', 'duracao' => '2h30', 'classificacao' => '12+', 'nota' => 7.5, 'poster' => 'dia-d.jpg'],
            ['titulo' => 'Vingadores', 'genero' => 'Ação e Aventura', 'duracao' => '2h30', 'classificacao' => '14+', 'nota' => 9.0, 'poster' => 'vingadores.jpg'],
            ['titulo' => 'Vingadores 3', 'genero' => 'Super-Herói', 'duracao' => '1h30', 'classificacao' => '12+', 'nota' => 8.7, 'poster' => 'vingadores-3.jpg'],
        ];

        foreach ($filmes as $filme) {
            $arquivo = 'imagem/filme/' . $filme['poster'];
            $filme['poster'] = Storage::disk('public')->exists($arquivo) ? $arquivo : null;

            Filme::create($filme);
        }
    }
}
