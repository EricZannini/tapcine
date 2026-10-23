<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class IngressoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $ingressosPorDia = DB::table('ingressos')
            ->select('data_venda', DB::raw('count(1) as total'))
            ->whereNotNull('data_venda')
            ->groupBy('data_venda')
            ->orderBy('data_venda')
            ->get();

        $dias = [];
        $totais = [];

        foreach ($ingressosPorDia as $item) {
            $dias[] = date('d/m', strtotime($item->data_venda));
            $totais[] = $item->total;
        }

        return (new LarapexChart)->areaChart()
            ->setTitle('Ingressos vendidos por dia')
            ->setSubtitle('Últimos dias de venda')
            ->addData($totais, 'Ingressos')
            ->setXAxis($dias)
            ->setColors(['#d52122'])
            ->setHeight(330);
    }
}
