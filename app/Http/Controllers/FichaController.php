<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\Filme;

class FichaController extends Controller
{
    public function index()
    {
        $dados = Ficha::with('filme')->get();

        return view('ficha.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $filmes = Filme::all();

        return view('ficha.form', compact('filmes'));
    }

    function validateForm(Request $request, $id = null)
    {
        $request->validate([
            // unique garante o 1:1 (um filme só pode ter uma ficha)
            'filme_id' => 'required|exists:filmes,id|unique:fichas,filme_id,' . $id,
            'diretor' => 'required',
            'ano' => 'required',
        ], [
            'filme_id.required' => 'O filme é obrigatorio',
            'filme_id.unique' => 'Esse filme já possui uma ficha técnica',
            'diretor.required' => 'O :attribute é obrigatorio',
            'ano.required' => 'O :attribute é obrigatorio',
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Ficha::create($request->all());

        return redirect('ficha')->with("success", 'Ficha técnica salva com sucesso!');
    }

    function edit($id)
    {
        $data = Ficha::find($id);
        $filmes = Filme::all();

        return view('ficha.form', compact('data', 'filmes'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request, $id);

        Ficha::find($id)->update($request->all());

        return redirect('ficha')->with("success", 'Ficha técnica atualizada com sucesso!');
    }

    function destroy($id)
    {
        Ficha::destroy($id);

        return redirect('ficha')->with("success", 'Ficha técnica removida com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Ficha::with('filme')->where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Ficha::with('filme')->get();
        }

        return view('ficha.list', compact('dados'));
    }
}
