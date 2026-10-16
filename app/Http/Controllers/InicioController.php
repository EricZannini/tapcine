<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Ingresso;
use App\Models\Ficha;
use App\Models\Ator;
use App\Models\Produto;

class InicioController extends Controller
{
    public function index()
    {
        $totalFilmes = Filme::count();
        $totalSessoes = Sessao::count();
        $totalIngressos = Ingresso::count();
        $totalFichas = Ficha::count();
        $totalAtores = Ator::count();
        $totalProdutos = Produto::count();

        return view('inicio', compact(
            'totalFilmes',
            'totalSessoes',
            'totalIngressos',
            'totalFichas',
            'totalAtores',
            'totalProdutos'
        ));
    }
}
