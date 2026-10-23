@extends('main')
@section('titulo', 'Formulário de Sessão')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('sessao.update', $data->id);
            } else {
                $action = route('sessao.store');
            }
        @endphp

        <h4><i class="fa-solid fa-clock"></i> Formulário Sessão</h4>
        <h6>Filme: {{ $filme->titulo }}</h6>
        <div class="col-lg-8 px-0">
        <div class="card"><div class="card-body position-relative">
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <input type="hidden" name="filme_id" value="{{ old('filme_id', $data->filme_id ?? $filme->id) }}">

            <div class="col-6">
                <label for="sala">Sala</label>
                <input type="text" name="sala" class="form-control" value="{{ old('sala', $data->sala ?? '') }}">
            </div>
            <div class="col-6">
                <label for="data_sessao">Data</label>
                <input type="date" name="data_sessao" class="form-control"
                    value="{{ old('data_sessao', $data->data_sessao ?? '') }}">
            </div>
            <div class="col-6">
                <label for="hora_inicio">Hora de Início</label>
                <input type="time" name="hora_inicio" class="form-control"
                    value="{{ old('hora_inicio', $data->hora_inicio ?? '') }}">
            </div>
            <div class="col-6">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control"
                    value="{{ old('preco', $data->preco ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                <a href="{{ route('filme.sessoes', $filme->id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
        </form>
        <div class="d-none d-lg-block" style="position: absolute; top: 50%; left: 75%; transform: translate(-50%, -50%);">
            @include('partials.lapis')
        </div>
        </div></div></div>
    </div>
@stop
