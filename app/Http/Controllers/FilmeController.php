<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index()
    {
        $dados = Filme::all();

        return view('filme.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('filme.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'genero' => 'required',
            'duracao' => 'required',
            'classificacao' => 'required',
            'poster' => 'nullable|image|mimes:png,jpg,jpeg',
            'nota' => 'nullable|numeric|min:0|max:10',
        ], [
            'titulo.required' => "O :attribute é obrigatorio",
            'genero.required' => "O :attribute é obrigatorio",
            'duracao.required' => "A :attribute é obrigatoria",
            'classificacao.required' => "A :attribute é obrigatoria",
            'poster.image' => "O :attribute deve ser uma imagem",
            'poster.mimes' => "O :attribute deve ser PNG, JPG ou JPEG",
            'nota.numeric' => "A :attribute deve ser um número",
            'nota.min' => "A :attribute deve ser no mínimo 0",
            'nota.max' => "A :attribute deve ser no máximo 10",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        $data = $request->all();
        $poster = $request->file('poster');

        if ($poster) {
            $nome_imagem = date('YmdHis') . "." . $poster->getClientOriginalExtension();
            //1
            $poster->storeAs("imagem/filme", $nome_imagem, 'public');
            $data['poster'] = "imagem/filme/" . $nome_imagem;
        }

        Filme::create($data);

        return redirect('filme')->with("success", 'Filme salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Filme::find($id);

        return view('filme.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        $filme = Filme::find($id);
        $data = $request->all();
        $poster = $request->file('poster');

        if ($poster) {
            if ($filme->poster) {
                Storage::disk('public')->delete($filme->poster);
            }
            $nome_imagem = date('YmdHis') . "." . $poster->getClientOriginalExtension();
            $poster->storeAs("imagem/filme", $nome_imagem, 'public');
            $data['poster'] = "imagem/filme/" . $nome_imagem;
        }

        $filme->update($data);

        return redirect('filme')->with("success", 'Filme atualizado com sucesso!');
    }

    function destroy($id)
    {
        $filme = Filme::find($id);

        if ($filme->poster) {
            Storage::disk('public')->delete($filme->poster);
        }

        $filme->delete();

        return redirect('filme')->with("success", 'Filme removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Filme::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Filme::all();
        }

        return view('filme.list', compact('dados'));
    }
}
