<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ator;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:png,jpg,jpeg',
        ], [
            'nome.required' => 'O :attribute é obrigatorio',
            'nacionalidade.required' => 'A :attribute é obrigatoria',
            'data_nascimento.required' => 'A :attribute é obrigatoria',
            'foto.image' => 'A :attribute deve ser uma imagem',
            'foto.mimes' => 'A :attribute deve ser PNG, JPG ou JPEG',
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        $data = $request->all();
        $foto = $request->file('foto');

        if ($foto) {
            $nome_imagem = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->storeAs("imagem/ator", $nome_imagem, 'public');
            $data['foto'] = "imagem/ator/" . $nome_imagem;
        }

        Ator::create($data);

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

        $ator = Ator::find($id);
        $data = $request->all();
        $foto = $request->file('foto');

        if ($foto) {
            if ($ator->foto) {
                Storage::disk('public')->delete($ator->foto);
            }
            $nome_imagem = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->storeAs("imagem/ator", $nome_imagem, 'public');
            $data['foto'] = "imagem/ator/" . $nome_imagem;
        }

        $ator->update($data);

        return redirect('ator')->with("success", 'Ator atualizado com sucesso!');
    }

    function destroy($id)
    {
        $ator = Ator::find($id);

        if ($ator->foto) {
            Storage::disk('public')->delete($ator->foto);
        }

        $ator->delete();

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
