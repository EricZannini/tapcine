@extends('main')
@section('titulo', 'Listagem de Ingressos')
@section('conteudo')
    <div class="row">

        <h3>Ingressos</h3>
        <form action="{{ route('ingresso.search') }}" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="cliente_nome">Cliente</option>
                        <option value="assento">Assento</option>
                        <option value="tipo_ingresso">Tipo</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <a href="{{ url('ingresso/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
                    <a href="{{ route('relatorio.ingressos') }}" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Sessão</th>
                    <th scope="col">Assento</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->cliente_nome }}</td>
                        <td>
                            @if ($item->sessao)
                                {{ $item->sessao->filme->titulo ?? '-' }} ({{ $item->sessao->sala }})
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->assento }}</td>
                        <td>{{ $item->tipo_ingresso }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('ingresso.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('ingresso.destroy', $item->id) }}" method="post">
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
        @if (method_exists($dados, 'links'))
            {{ $dados->links() }}
        @endif
    </div>
@stop
