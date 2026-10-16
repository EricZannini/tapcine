<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ator;

class AtorController extends Controller
{
    public function index()
    {
        $dados = Ator::all();

        return view('ator.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('ator.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'nacionalidade' => 'required',
            'data_nascimento' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatorio',
            'nacionalidade.required' => 'A :attribute é obrigatoria',
            'data_nascimento.required' => 'A :attribute é obrigatoria',
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Ator::create($request->all());

        return redirect('ator')->with("success", 'Ator salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Ator::find($id);

        return view('ator.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Ator::find($id)->update($request->all());

        return redirect('ator')->with("success", 'Ator atualizado com sucesso!');
    }

    function destroy($id)
    {
        Ator::destroy($id);

        return redirect('ator')->with("success", 'Ator removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Ator::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Ator::all();
        }

        return view('ator.list', compact('dados'));
    }
}
