<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $dados = Produto::paginate(10);

        return view('produto.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('produto.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'preco' => 'required|numeric',
            'quantidade_vendida' => 'nullable|integer|min:0',
        ], [
            'nome.required' => 'O :attribute é obrigatorio',
            'categoria.required' => 'A :attribute é obrigatoria',
            'preco.required' => 'O :attribute é obrigatorio',
            'preco.numeric' => 'O :attribute deve ser um número',
            'quantidade_vendida.integer' => 'A quantidade vendida deve ser um número inteiro',
            'quantidade_vendida.min' => 'A quantidade vendida não pode ser negativa',
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Produto::create($request->all());

        return redirect('produto')->with("success", 'Produto salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Produto::find($id);

        return view('produto.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Produto::find($id)->update($request->all());

        return redirect('produto')->with("success", 'Produto atualizado com sucesso!');
    }

    function destroy($id)
    {
        Produto::destroy($id);

        return redirect('produto')->with("success", 'Produto removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Produto::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Produto::all();
        }

        return view('produto.list', compact('dados'));
    }
}
