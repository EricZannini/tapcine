@extends('main')
@section('titulo', 'Formulário de Produto')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('produto.update', $data->id);
            } else {
                $action = route('produto.store');
            }
        @endphp

        <h4>Formulário Produto</h4>
        <div class="col-lg-8 px-0">
        <div class="card"><div class="card-body">
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
            </div>
            <div class="col-6">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-select">
                    @foreach (['Pipoca', 'Bebida', 'Doce', 'Combo'] as $cat)
                        <option value="{{ $cat }}"
                            {{ old('categoria', $data->categoria ?? '') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control"
                    value="{{ old('preco', $data->preco ?? '') }}">
            </div>
            <div class="col-6">
                <label for="quantidade_vendida">Quantidade Vendida</label>
                <input type="number" min="0" name="quantidade_vendida" class="form-control"
                    value="{{ old('quantidade_vendida', $data->quantidade_vendida ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                <a href="{{ url('produto') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
        </form>
        </div></div></div>
    </div>
@stop
