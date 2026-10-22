@extends('main')
@section('titulo', 'Gráficos - TapCine')
@section('conteudo')
    <h3 class="mb-4">Gráficos</h3>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Vendas da Bomboniere</h5>
                    <div id="graficoProdutos"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Notas dos Filmes</h5>
                    <div id="graficoFilmes"></div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Ingressos vendidos por dia</h5>
                    <div id="graficoIngressos"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.54.1/dist/apexcharts.min.js"></script>
    <script>
        new ApexCharts(document.querySelector("#graficoProdutos"), {
            chart: { type: 'pie', height: 330 },
            series: @json($produtoDados),
            labels: @json($produtoLabels),
            colors: ['#DE1A1A', '#b81414', '#f06a6a', '#7a0d0d', '#e89b9b', '#ff6b6b'],
            legend: { position: 'bottom' }
        }).render();

        new ApexCharts(document.querySelector("#graficoFilmes"), {
            chart: { type: 'bar', height: 330 },
            series: [{ name: 'Nota', data: @json($filmeDados) }],
            xaxis: { categories: @json($filmeLabels), labels: { rotate: -45, style: { fontSize: '10px' } } },
            yaxis: { max: 10 },
            colors: ['#DE1A1A'],
            plotOptions: { bar: { borderRadius: 4, columnWidth: '55%' } },
            dataLabels: { enabled: false }
        }).render();

        new ApexCharts(document.querySelector("#graficoIngressos"), {
            chart: { type: 'area', height: 330 },
            series: [{ name: 'Ingressos', data: @json($ingressoDados) }],
            xaxis: { categories: @json($ingressoLabels) },
            colors: ['#DE1A1A'],
            stroke: { curve: 'smooth' },
            fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.5, opacityTo: 0.1 } },
            dataLabels: { enabled: false }
        }).render();
    </script>
@stop
