<?php

namespace App\Http\Controllers;

use App\Charts\ProdutoChart;
use App\Charts\NotaFilmeChart;
use App\Charts\IngressoChart;

class GraficoController extends Controller
{
    public function index(ProdutoChart $produtoChart, NotaFilmeChart $notaFilmeChart, IngressoChart $ingressoChart)
    {
        return view('grafico.index', [
            'produtoChart' => $produtoChart->build(),
            'notaFilmeChart' => $notaFilmeChart->build(),
            'ingressoChart' => $ingressoChart->build(),
        ]);
    }
}
