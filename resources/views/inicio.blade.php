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

        /* Pasta animada (From Uiverse.io - reimplementado em CSS) */
        .pasta-card { display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--ink); }
        .pasta { position: relative; width: 210px; height: 150px; cursor: pointer; perspective: 1500px; }

        .pasta-fundo {
            position: absolute; inset: 0; background: #d97706;
            border-radius: 16px; border-top-left-radius: 0; transition: all .3s ease;
        }
        .pasta-fundo::after {
            content: ''; position: absolute; bottom: 99%; left: 0; width: 70px; height: 16px;
            background: #d97706; border-top-left-radius: 16px; border-top-right-radius: 16px;
        }
        .pasta-fundo::before {
            content: ''; position: absolute; top: -14px; left: 66px; width: 16px; height: 16px;
            background: #d97706; clip-path: polygon(0 35%, 0 100%, 50% 100%);
        }

        .papel { position: absolute; inset: 4px; border-radius: 16px; transition: all .3s ease; transform-origin: bottom; }
        .papel-4 { background: #a1a1aa; }
        .papel-3 { background: #d4d4d8; }
        .papel-2 { background: #e4e4e7; }

        .pasta-frente {
            position: absolute; bottom: 0; width: 100%; height: 146px;
            background: linear-gradient(to top, #f59e0b, #fbbf24);
            border-radius: 16px; border-top-right-radius: 0; transition: all .3s ease; transform-origin: bottom;
        }
        .pasta-frente::after {
            content: ''; position: absolute; bottom: 99%; right: 0; width: 128px; height: 16px;
            background: #fbbf24; border-top-left-radius: 16px; border-top-right-radius: 16px;
        }
        .pasta-frente::before {
            content: ''; position: absolute; top: -9px; right: 124px; width: 12px; height: 12px;
            background: #fbbf24; clip-path: polygon(100% 14%, 50% 100%, 100% 100%);
        }

        .pasta:hover .papel-4 { transform: rotateX(-20deg); }
        .pasta:hover .papel-3 { transform: rotateX(-30deg); }
        .pasta:hover .papel-2 { transform: rotateX(-38deg); }
        .pasta:hover .pasta-frente {
            transform: rotateX(-46deg) translateY(1px);
            box-shadow: inset 0 20px 40px #fbbf24, inset 0 -20px 40px #d97706;
        }
        .pasta:hover .pasta-fundo { box-shadow: 0 20px 40px rgba(0, 0, 0, .2); }

        .pasta-titulo { font-size: 1.5rem; padding-top: 1rem; margin: 0; font-weight: 600; }
        .pasta-contagem { font-size: 1.1rem; opacity: .3; margin: 0; }
    </style>

    <h3 class="mb-1">Bem-vindo, {{ session('usuario_nome', 'Administrador') }}</h3>
    <p class="muted-2 mb-4">Painel administrativo do TapCine.</p>

    <br>
    <div class="row g-4">
        <div class="col-md-4">
            @include('partials.pasta', ['titulo' => 'Filmes', 'contagem' => $totalFilmes, 'link' => url('filme')])
        </div>
        <div class="col-md-4">
            @include('partials.pasta', ['titulo' => 'Sessões', 'contagem' => $totalSessoes, 'link' => url('sessao')])
        </div>
        <div class="col-md-4">
            @include('partials.pasta', ['titulo' => 'Ingressos', 'contagem' => $totalIngressos, 'link' => url('ingresso')])
        </div>
        <div class="col-md-4">
            @include('partials.pasta', ['titulo' => 'Fichas', 'contagem' => $totalFichas, 'link' => url('ficha')])
        </div>
        <div class="col-md-4">
            @include('partials.pasta', ['titulo' => 'Atores', 'contagem' => $totalAtores, 'link' => url('ator')])
        </div>
        <div class="col-md-4">
            @include('partials.pasta', ['titulo' => 'Produtos', 'contagem' => $totalProdutos, 'link' => url('produto')])
        </div>
    </div>
@stop
