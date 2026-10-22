@extends('main')
@section('titulo', 'Quiz de Filmes - TapCine')
@section('conteudo')
    {{-- Componente de radio: From Uiverse.io by Yaya12085 (licença MIT), adaptado à paleta --}}
    <style>
        .radio-input input { display: none; }

        .radio-input {
            display: flex;
            flex-direction: column;
            padding: 16px;
            background: var(--card);
            color: var(--ink);
            border: 2px solid var(--laranja);
            border-radius: 14px;
            box-shadow: 6px 6px 0 var(--marinho);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .radio-input:hover { transform: translate(-2px, -2px); box-shadow: 8px 8px 0 var(--marinho); }

        .info { margin-bottom: 8px; display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .question { color: var(--ink); font-size: 1rem; line-height: 1.25rem; font-weight: 800; }
        .steps { background: var(--laranja); padding: 4px 8px; color: #fff; border-radius: 6px; font-size: 12px; font-weight: 700; white-space: nowrap; }

        .radio-input label {
            display: flex;
            background: #ffffff;
            padding: 12px 14px;
            margin: 8px 0 0 0;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            border: 1px solid var(--line);
            color: var(--ink);
            transition: .25s ease;
        }
        .radio-input label:hover { background: #f5f6fb; border-color: #bbb; }

        .result { margin-top: 10px; font-weight: 700; font-size: 13px; display: none; }
        .result.success { color: #148a3f; }
        .result.error { color: var(--laranja); }

        .radio-input input:checked + label { border-color: var(--laranja); color: var(--laranja); }
        .radio-input input[value="value-2"]:checked + label { border-color: #17b510; color: #109b0e; }

        .radio-input:has(input[value="value-2"]:checked) .result.success { display: flex; }
        .radio-input:has(input:not([value="value-2"]):checked) .result.error { display: flex; }

        .quiz-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 18px; margin-top: 4px; }
    </style>

    <h3 class="mb-1">Quiz de Filmes</h3>
    <p class="mb-4" style="color: var(--muted)">Teste seus conhecimentos!</p>

    <div class="quiz-grid">

        <div class="radio-input">
            <div class="info">
                <span class="question">No universo Marvel, qual é o nome do planeta natal de Thanos?</span>
                <span class="steps">1/3</span>
            </div>
            <input type="radio" id="q1a" name="q1" value="value-1">
            <label for="q1a">Xandar</label>
            <input type="radio" id="q1b" name="q1" value="value-2">
            <label for="q1b">Titã</label>
            <input type="radio" id="q1c" name="q1" value="value-3">
            <label for="q1c">Sakaar</label>
            <input type="radio" id="q1d" name="q1" value="value-4">
            <label for="q1d">Vormir</label>
            <span class="result success">Certo</span>
            <span class="result error">Errado</span>
        </div>

        <div class="radio-input">
            <div class="info">
                <span class="question">Que carro vira máquina do tempo em "De Volta para o Futuro"?</span>
                <span class="steps">2/3</span>
            </div>
            <input type="radio" id="q2a" name="q2" value="value-1">
            <label for="q2a">Ferrari Testarossa</label>
            <input type="radio" id="q2b" name="q2" value="value-2">
            <label for="q2b">DeLorean DMC-12</label>
            <input type="radio" id="q2c" name="q2" value="value-3">
            <label for="q2c">Ford Mustang</label>
            <input type="radio" id="q2d" name="q2" value="value-4">
            <label for="q2d">Chevrolet Camaro</label>
            <span class="result success">Certo</span>
            <span class="result error">Errado</span>
        </div>

        <div class="radio-input">
            <div class="info">
                <span class="question">Em "Jurassic Park", de onde vem o material para recriar os dinossauros?</span>
                <span class="steps">3/3</span>
            </div>
            <input type="radio" id="q3a" name="q3" value="value-1">
            <label for="q3a">Ovos fossilizados</label>
            <input type="radio" id="q3b" name="q3" value="value-2">
            <label for="q3b">DNA preservado em âmbar</label>
            <input type="radio" id="q3c" name="q3" value="value-3">
            <label for="q3c">Ossos reconstruídos</label>
            <input type="radio" id="q3d" name="q3" value="value-4">
            <label for="q3d">Pegadas fossilizadas</label>
            <span class="result success">Certo</span>
            <span class="result error">Errado</span>
        </div>

    </div>
@stop
