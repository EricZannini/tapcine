<?php

namespace App\Charts;

use App\Models\Filme;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class NotaFilmeChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $filmes = Filme::orderBy('nota', 'desc')->get();

        $titulos = [];
        $notas = [];

        foreach ($filmes as $item) {
            $titulos[] = $item->titulo;
            $notas[] = (float) $item->nota;
        }

        return (new LarapexChart)->barChart()
            ->setTitle('Notas dos Filmes')
            ->setSubtitle('Nota de 0 a 10')
            ->addData($notas, 'Nota')
            ->setXAxis($titulos)
            ->setColors(['#d52122'])
            ->setHeight(330);
    }
}
