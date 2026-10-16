@extends('main')
@section('titulo', 'Atores - TapCine')
@section('conteudo')
    <div class="row">

        <h3>Atores</h3>
        <form action="{{ route('ator.search') }}" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="nacionalidade">Nacionalidade</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <a href="{{ url('ator/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Nacionalidade</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>
                            @if ($item->foto)
                                <img src="/storage/{{ $item->foto }}" width="45" class="rounded" alt="">
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->nacionalidade }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->data_nascimento)->format('d/m/Y') }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('ator.edit', $item->id) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('ator.destroy', $item->id) }}" method="post">
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
