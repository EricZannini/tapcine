<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ator;

class AtorSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['nome' => 'Tom Hanks', 'nacionalidade' => 'Estados Unidos', 'data_nascimento' => '1956-07-09'],
            ['nome' => 'Fernanda Montenegro', 'nacionalidade' => 'Brasil', 'data_nascimento' => '1929-10-16'],
            ['nome' => 'Scarlett Johansson', 'nacionalidade' => 'Estados Unidos', 'data_nascimento' => '1984-11-22'],
            ['nome' => 'Wagner Moura', 'nacionalidade' => 'Brasil', 'data_nascimento' => '1976-06-27'],
            ['nome' => 'Robert Downey Jr.', 'nacionalidade' => 'Estados Unidos', 'data_nascimento' => '1965-04-04'],
        ];

        foreach ($dados as $item) {
            Ator::create($item);
        }
    }
}
