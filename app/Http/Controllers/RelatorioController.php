<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Ingresso;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    //5
    public function produtos()
    {
        $dados = Produto::orderBy('nome')->get();

        $pdf = Pdf::loadView('pdf.produtos', compact('dados'));

        return $pdf->download('relatorio_produtos.pdf');
    }

    public function ingressos()
    {
        $dados = Ingresso::with('sessao.filme')->orderBy('data_venda')->get();

        $pdf = Pdf::loadView('pdf.ingressos', compact('dados'));

        return $pdf->download('relatorio_ingressos.pdf');
    }
}
