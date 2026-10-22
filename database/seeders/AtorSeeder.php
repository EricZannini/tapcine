<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Ator;

class AtorSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['nome' => 'Tom Hanks', 'nacionalidade' => 'Estados Unidos', 'data_nascimento' => '1956-07-09', 'foto' => 'tom-hanks.jpg'],
            ['nome' => 'Fernanda Montenegro', 'nacionalidade' => 'Brasil', 'data_nascimento' => '1929-10-16', 'foto' => 'fernanda-montenegro.jpg'],
            ['nome' => 'Scarlett Johansson', 'nacionalidade' => 'Estados Unidos', 'data_nascimento' => '1984-11-22', 'foto' => 'scarlett-johansson.jpg'],
            ['nome' => 'Wagner Moura', 'nacionalidade' => 'Brasil', 'data_nascimento' => '1976-06-27', 'foto' => 'wagner-moura.jpg'],
            ['nome' => 'Robert Downey Jr.', 'nacionalidade' => 'Estados Unidos', 'data_nascimento' => '1965-04-04', 'foto' => 'robert-downey-jr.jpg'],
        ];

        foreach ($dados as $item) {
            $arquivo = 'imagem/ator/' . $item['foto'];
            $item['foto'] = Storage::disk('public')->exists($arquivo) ? $arquivo : null;

            Ator::create($item);
        }
    }
}
