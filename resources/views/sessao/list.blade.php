@extends('main')
@section('titulo', 'Listagem de Sessões')
@section('conteudo')
    <div class="row">

        <h3><i class="fa-solid fa-clock"></i> Sessões</h3>
        <h5>Filme: {{ $filme->titulo }}</h5>
        <form action="{{ route('sessao.search') }}" method="post">
            @csrf
            <input type="hidden" name="filme_id" value="{{ $filme->id }}">
            <div class="row align-items-end">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="sala">Sala</option>
                        <option value="data_sessao">Data</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <a href="{{ route('filme.sessoes.create', $filme->id) }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
                    <a href="{{ url('filme') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->sala }}</td>
                        <td>{{ $item->data_sessao }}</td>
                        <td>{{ $item->hora_inicio }}</td>
                        <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('sessao.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('sessao.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Excluir'
                                    onclick="return confirm('Deseja Excluir?')"><i class="fa-solid fa-trash"></i> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Nenhum registro encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
