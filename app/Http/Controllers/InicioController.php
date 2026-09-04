<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Ingresso;

class InicioController extends Controller
{
    public function index()
    {
        $totalFilmes = Filme::count();
        $totalSessoes = Sessao::count();
        $totalIngressos = Ingresso::count();

        return view('inicio', compact('totalFilmes', 'totalSessoes', 'totalIngressos'));
    }
}
