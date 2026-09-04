@extends('main')
@section('titulo', 'Início - TapCine')
@section('conteudo')
    <style>
        /* Cards com sombra sólida deslocada (estilo Uiverse) na paleta */
        .card {
            background: var(--card);
            color: var(--ink);
            border: 2px solid var(--rojo);
            border-radius: 14px;
            box-shadow: 6px 6px 0 var(--rojo-strong);
            transition: all .2s ease;
        }
        .card:hover {
            transform: translate(-2px, -2px);
            box-shadow: 8px 8px 0 var(--rojo-strong);
        }
        .muted-2 { color: var(--muted); }
        .num-big { font-size: 42px; font-weight: 700; letter-spacing: -.02em; line-height: 1; color: var(--rojo); }
    </style>

    <h3 class="mb-1">Bem-vindo, {{ session('usuario_nome', 'Administrador') }}</h3>
    <p class="muted-2 mb-4">Painel administrativo do TapCine.</p>

    {{-- Cards de contagem --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="muted-2">Filmes em cartaz</h6>
                    <div class="num-big">{{ $totalFilmes }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="muted-2">Sessões programadas</h6>
                    <div class="num-big">{{ $totalSessoes }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="muted-2">Ingressos vendidos</h6>
                    <div class="num-big">{{ $totalIngressos }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Atalhos para os CRUDs --}}
    <h4 class="mb-3">Acesso rápido</h4>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5>Filmes</h5>
                    <p class="muted-2">Cadastre e gerencie os filmes em cartaz.</p>
                    <a href="{{ url('filme') }}" class="btn btn-primary mt-auto">Abrir Filmes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5>Sessões</h5>
                    <p class="muted-2">Defina salas, horários e o filme de cada sessão.</p>
                    <a href="{{ url('sessao') }}" class="btn btn-primary mt-auto">Abrir Sessões</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5>Ingressos</h5>
                    <p class="muted-2">Registre os ingressos vendidos por sessão.</p>
                    <a href="{{ url('ingresso') }}" class="btn btn-primary mt-auto">Abrir Ingressos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        @include('partials.servidor')
    </div>
@stop
