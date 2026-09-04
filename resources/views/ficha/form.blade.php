@extends('main')
@section('titulo', 'Formulário de Ficha Técnica')
@section('conteudo')
    <div class="row">

        @php
            if (!empty($data->id)) {
                $action = route('ficha.update', $data->id);
            } else {
                $action = route('ficha.store');
            }
        @endphp

        <h4>Ficha Técnica</h4>

        <div class="col-lg-8 px-0">
            <div class="card">
                <div class="card-body position-relative">
                    <form action="{{ $action }}" method="post">
                        @csrf
                        @if (!empty($data->id))
                            @method('PUT')
                        @endif

                        <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">

                        <div class="col-6 mb-2">
                            <label for="filme_id">Filme</label>
                            <select name="filme_id" class="form-select">
                                <option value="">Selecione um filme</option>
                                @foreach ($filmes as $filme)
                                    <option value="{{ $filme->id }}"
                                        {{ old('filme_id', $data->filme_id ?? '') == $filme->id ? 'selected' : '' }}>
                                        {{ $filme->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="diretor">Diretor</label>
                            <input type="text" name="diretor" class="form-control"
                                value="{{ old('diretor', $data->diretor ?? '') }}">
                        </div>

                        <div class="col-6 mb-2">
                            <label for="ano">Ano</label>
                            <input type="text" name="ano" class="form-control"
                                value="{{ old('ano', $data->ano ?? '') }}" placeholder="Ex: 2024">
                        </div>

                        <div class="col-6 mb-2">
                            <label for="sinopse">Sinopse</label>
                            <textarea name="sinopse" class="form-control" rows="3">{{ old('sinopse', $data->sinopse ?? '') }}</textarea>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                            <a href="{{ url('ficha') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                        </div>
                    </form>
                    <div class="d-none d-lg-block" style="position: absolute; top: 50%; left: 75%; transform: translate(-50%, -50%);">
                        @include('partials.lapis')
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
