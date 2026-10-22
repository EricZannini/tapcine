@extends('main')
@section('titulo', 'Formulário de Ingresso')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('ingresso.update', $data->id);
            } else {
                $action = route('ingresso.store');
            }
        @endphp

        <h4><i class="fa-solid fa-ticket"></i> Formulário Ingresso</h4>
        <div class="col-lg-8 px-0">
        <div class="card"><div class="card-body position-relative">
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">

            <div class="col-6">
                <label for="sessao_id">Sessão</label>
                <select name="sessao_id" class="form-select">
                    <option value="">Selecione uma sessão</option>
                    @foreach ($sessoes as $sessao)
                        <option value="{{ $sessao->id }}"
                            {{ old('sessao_id', $data->sessao_id ?? '') == $sessao->id ? 'selected' : '' }}>
                            {{ $sessao->filme->titulo ?? 'Filme' }} - {{ $sessao->sala }} ({{ $sessao->data_sessao }} {{ $sessao->hora_inicio }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="cliente_nome">Cliente</label>
                <input type="text" name="cliente_nome" class="form-control"
                    value="{{ old('cliente_nome', $data->cliente_nome ?? '') }}">
            </div>
            <div class="col-6">
                <label for="assento">Assento</label>
                <input type="text" name="assento" class="form-control"
                    value="{{ old('assento', $data->assento ?? '') }}" placeholder="Ex: A1">
            </div>
            <div class="col-6">
                <label for="tipo_ingresso">Tipo de Ingresso</label>
                <select name="tipo_ingresso" class="form-select">
                    <option value="Inteira" {{ old('tipo_ingresso', $data->tipo_ingresso ?? '') == 'Inteira' ? 'selected' : '' }}>Inteira</option>
                    <option value="Meia" {{ old('tipo_ingresso', $data->tipo_ingresso ?? '') == 'Meia' ? 'selected' : '' }}>Meia</option>
                </select>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                <a href="{{ url('ingresso') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
        </form>
        <div class="d-none d-lg-block" style="position: absolute; top: 50%; left: 75%; transform: translate(-50%, -50%);">
            @include('partials.lapis')
        </div>
        </div></div></div>
    </div>
@stop
