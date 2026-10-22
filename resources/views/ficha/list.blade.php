@extends('main')
@section('titulo', 'Fichas Técnicas - TapCine')
@section('conteudo')
    <div class="row">

        <h3>Fichas Técnicas</h3>
        <form action="{{ route('ficha.search') }}" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="diretor">Diretor</option>
                        <option value="ano">Ano</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <a href="{{ url('ficha/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Filme</th>
                    <th scope="col">Diretor</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->filme->titulo ?? '—' }}</td>
                        <td>{{ $item->diretor }}</td>
                        <td>{{ $item->ano }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('ficha.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('ficha.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Excluir'
                                    onclick="return confirm('Deseja Excluir?')"><i class="fa-solid fa-trash"></i> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Nenhum registro encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if (method_exists($dados, 'links'))
            {{ $dados->links() }}
        @endif
    </div>
@stop
