@extends('main')
@section('titulo', 'Listagem de Filmes')
@section('conteudo')
    <div class="row">

        <h3><i class="fa-solid fa-film"></i> Filmes em Cartaz</h3>
        <form action="{{ route('filme.search') }}" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="titulo">Título</option>
                        <option value="genero">Gênero</option>
                        <option value="classificacao">Classificação</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <a href="{{ url('filme/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
                </div>
            </div>
        </form>

    </div>

    {{-- grade de cards: g-4 dá o espaço entre eles --}}
    <div class="row g-4 mt-1">
        {{-- @forelse percorre os filmes; se a lista vier vazia, cai no @empty --}}
        @forelse ($dados as $item)
            {{-- 2 cards por linha no celular, 3 em tela média e 4 em tela grande --}}
            <div class="col-6 col-md-4 col-lg-3">
                {{-- h-100 deixa todos os cards da linha com a mesma altura --}}
                <div class="card h-100 overflow-hidden">
                    {{-- mostra o pôster salvo em storage/app/public; sem pôster, mostra um ícone --}}
                    @if ($item->poster)
                        <img src="/storage/{{ $item->poster }}" class="card-capa" alt="Pôster de {{ $item->titulo }}">
                    @else
                        <div class="capa-vazia"><i class="fa-solid fa-film"></i></div>
                    @endif
                    {{-- flex-column empilha as informações uma embaixo da outra --}}
                    <div class="card-body d-flex flex-column">
                        <h5 class="mb-1">{{ $item->titulo }}</h5>
                        <p class="text-muted small mb-2">{{ $item->genero }}</p>
                        <p class="small mb-3">{{ $item->duracao }} · {{ $item->classificacao }} · Nota {{ $item->nota }}</p>
                        {{-- mt-auto empurra os botões para o fim do card --}}
                        <div class="card-acoes mt-auto">
                            <a class="btn btn-warning" href="{{ route('filme.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                            {{-- o navegador só envia GET/POST, então o @method('DELETE') avisa o Laravel que é exclusão --}}
                            <form action="{{ route('filme.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Deseja Excluir?')"><i class="fa-solid fa-trash"></i> Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center py-4">Nenhum registro encontrado.</p>
            </div>
        @endforelse
    </div>

@stop
