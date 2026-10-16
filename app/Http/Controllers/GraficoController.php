<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Produto;
use App\Models\Ingresso;

class GraficoController extends Controller
{
    public function index()
    {
        // Pizza: vendas da bomboniere (quantidade vendida por produto)
        $produtos = Produto::orderBy('quantidade_vendida', 'desc')->get();
        $produtoLabels = $produtos->pluck('nome');
        $produtoDados = $produtos->pluck('quantidade_vendida');

        // Barra: nota dos filmes
        $filmes = Filme::orderBy('nota', 'desc')->get();
        $filmeLabels = $filmes->pluck('titulo');
        $filmeDados = $filmes->pluck('nota')->map(fn($n) => (float) $n);

        // Área: ingressos vendidos por dia
        $ingressos = Ingresso::selectRaw('data_venda, COUNT(*) as total')
            ->whereNotNull('data_venda')
            ->groupBy('data_venda')
            ->orderBy('data_venda')
            ->get();
        $ingressoLabels = $ingressos->pluck('data_venda')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d/m'));
        $ingressoDados = $ingressos->pluck('total');

        return view('grafico.index', compact(
            'produtoLabels',
            'produtoDados',
            'filmeLabels',
            'filmeDados',
            'ingressoLabels',
            'ingressoDados'
        ));
    }
}
