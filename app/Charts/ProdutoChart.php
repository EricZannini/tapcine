<?php

namespace App\Charts;

use App\Models\Produto;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProdutoChart
{
    //4
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $produtos = Produto::orderBy('quantidade_vendida', 'desc')->get();

        $nomeProdutos = [];
        $qtdVendida = [];

        foreach ($produtos as $item) {
            $nomeProdutos[] = $item->nome;
            $qtdVendida[] = $item->quantidade_vendida;
        }

        return (new LarapexChart)->pieChart()
            ->setTitle('Vendas de Produtos')
            ->setSubtitle('Quantidade vendida de cada produto')
            ->addData($qtdVendida)
            ->setLabels($nomeProdutos)
            ->setColors(['#d52122', '#5c1112', '#f0a3a3', '#a3181a', '#e8595a', '#fbbf24'])
            ->setHeight(330);
    }
}
