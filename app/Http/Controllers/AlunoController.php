<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Requests\AlunoRequest;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $data = Aluno::orderBy('created_at', 'desc')->paginate(5);
        $nome = $request->get('nome');

        if ($nome) {
            $data = Aluno::where('nome', 'like', "%$nome%")->orderBy('created_at', 'desc')->paginate(5);
        }
        return view('alunos.index', compact('nome', 'data'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(AlunoRequest $request)
    {
        Aluno::create($request->all());

        \Session::flash('flash_message', 'Registro inserido com sucesso!');

        return redirect('alunos');
    }

    public function edit($id)
    {
        $data = Aluno::findOrFail($id);

        return view('alunos.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        Aluno::findOrFail($id)->update($request->all());

        \Session::flash('flash_message', 'Registro atualizado com sucesso!');

        return redirect('alunos');
    }

    public function destroy($id)
    {
        Aluno::findOrFail($id)->delete();

        \Session::flash('flash_message','Registro excluido com sucesso!');

        return redirect('alunos');
    }
}
