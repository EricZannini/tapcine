@extends('main')
@section('titulo', 'Listagem de Filmes')
@section('conteudo')
    <div class="row">

        <h3>Filmes em Cartaz</h3>
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

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pôster</th>
                    <th scope="col">Título</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Classificação</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>
                            @if ($item->poster)
                                <img src="/storage/{{ $item->poster }}" width="45" class="rounded" alt="">
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $item->titulo }}</td>
                        <td>{{ $item->genero }}</td>
                        <td>{{ $item->duracao }}</td>
                        <td>{{ $item->classificacao }}</td>
                        <td>@include('partials.estrelas', ['nota' => $item->nota])</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('filme.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('filme.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Excluir'
                                    onclick="return confirm('Deseja Excluir?')"><i class="fa-solid fa-trash"></i> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
