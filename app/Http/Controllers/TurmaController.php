<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\{Aluno, AlunoTurma, Turma};
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index(Request $request)
    {
        $data = Turma::orderBy('created_at', 'desc')->paginate(5);
        $nome = $request->get('nome');

        if ($nome) {
            $data = Turma::where('nome', 'like', "%$nome%")->orderBy('created_at', 'desc')->paginate(5);
        }
        return view('turmas.index', compact('nome', 'data'));
    }

    public function create()
    {
        $alunos = Aluno::orderBy('nome', 'desc')->get(['id', 'nome']);

        return view('turmas.create', compact('alunos'));
    }

    public function store(TurmaRequest $request)
    {
        $turma = Turma::create(['nome' => $request->get('nome')]);

        $turma->alunos()->attach($request->get('aluno_id'));

        \Session::flash('flash_message', 'Registro inserido com sucesso!');

        return redirect('turmas');
    }

    public function edit($id)
    {
        $data = Turma::findOrFail($id);

        $alunos = Aluno::orderBy('nome', 'desc')->get(['id', 'nome']);
        $alunosTurma = AlunoTurma::where('turma_id', $data->id)->get();

        return view('turmas.edit', compact('data', 'alunos', 'alunosTurma'));
    }

    public function update($id, Request $request)
    {
        $turma = Turma::findOrFail($id);
        $turma->update($request->all());

        $turma->alunos()->sync($request->get('aluno_id'));

        \Session::flash('flash_message', 'Registro atualizado com sucesso!');

        return redirect('turmas');
    }

    public function destroy($id)
    {
        Turma::findOrFail($id)->delete();

        \Session::flash('flash_message','Registro excluido com sucesso!');

        return redirect('turmas');
    }
}
