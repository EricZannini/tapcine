@extends('main')
@section('titulo', 'Produtos - TapCine')
@section('conteudo')
    <div class="row">

        <h3>Produtos (Bomboniere)</h3>
        <form action="{{ route('produto.search') }}" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="categoria">Categoria</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <a href="{{ url('produto/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
                    <a href="{{ route('relatorio.produtos') }}" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('produto.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('produto.destroy', $item->id) }}" method="post">
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
