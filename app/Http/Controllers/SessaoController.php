<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use App\Models\Filme;

class SessaoController extends Controller
{
    public function index(Filme $filme)
    {
        $dados = $filme->sessoes;

        return view('sessao.list')->with([
            'dados' => $dados,
            'filme' => $filme,
        ]);
    }

    function create(Filme $filme)
    {
        return view('sessao.form', compact('filme'));
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'filme_id' => 'required|exists:filmes,id',
            'sala' => 'required',
            'data_sessao' => 'required|date',
            'hora_inicio' => 'required',
            'preco' => 'required|numeric',
        ], [
            'filme_id.required' => "O filme é obrigatorio",
            'filme_id.exists' => "O filme selecionado não existe",
            'sala.required' => "A :attribute é obrigatoria",
            'data_sessao.required' => "A data é obrigatoria",
            'data_sessao.date' => "A data deve ser válida",
            'hora_inicio.required' => "A hora é obrigatoria",
            'preco.required' => "O :attribute é obrigatorio",
            'preco.numeric' => "O :attribute deve ser um número",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        $sessao = Sessao::create($request->all());

        return redirect()->route('filme.sessoes', $sessao->filme_id)->with("success", 'Sessão salva com sucesso!');
    }

    function edit($id)
    {
        $data = Sessao::find($id);
        $filme = Filme::find($data->filme_id);

        return view('sessao.form', compact('data', 'filme'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Sessao::find($id)->update($request->all());

        return redirect()->route('filme.sessoes', $request->filme_id)->with("success", 'Sessão atualizada com sucesso!');
    }

    function destroy($id)
    {
        $data = Sessao::find($id);

        Sessao::destroy($id);

        return redirect()->route('filme.sessoes', $data->filme_id)->with("success", 'Sessão removida com sucesso!');
    }

    public function search(Request $request)
    {
        $filme = Filme::find($request->filme_id);

        if (!empty($request->valor)) {
            $dados = Sessao::where('filme_id', $filme->id)->where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = $filme->sessoes;
        }

        return view('sessao.list', compact('dados', 'filme'));
    }
}
