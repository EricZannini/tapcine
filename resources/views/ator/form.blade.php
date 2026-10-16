@extends('main')
@section('titulo', 'Formulário de Ator')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('ator.update', $data->id);
            } else {
                $action = route('ator.store');
            }
        @endphp

        <h4>Formulário Ator</h4>
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
                <label for="nacionalidade">Nacionalidade</label>
                <input type="text" name="nacionalidade" class="form-control"
                    value="{{ old('nacionalidade', $data->nacionalidade ?? '') }}">
            </div>
            <div class="col-6">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control"
                    value="{{ old('data_nascimento', $data->data_nascimento ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                <a href="{{ url('ator') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
        </form>
        </div></div></div>
    </div>
@stop
