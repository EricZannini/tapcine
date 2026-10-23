@extends('main')
@section('titulo', 'Gráficos - TapCine')
@section('conteudo')
    <h3 class="mb-4"><i class="fa-solid fa-chart-pie"></i> Gráficos</h3>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    {!! $produtoChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    {!! $notaFilmeChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! $ingressoChart->container() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ $produtoChart->cdn() }}"></script>

    {{ $produtoChart->script() }}
    {{ $notaFilmeChart->script() }}
    {{ $ingressoChart->script() }}
@stop
