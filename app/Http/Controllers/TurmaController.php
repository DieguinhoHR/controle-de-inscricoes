<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $turmas = Turma::orderBy('created_at', 'desc')->paginate(10);

        $nomeDaTurma = $request->get('nome');

        if ($nomeDaTurma) {
            $turmas = Turma::where('nome', 'like', "%$nomeDaTurma%")->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('turmas.index', compact('nomeDaTurma', 'turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(TurmaRequest $request)
    {
        Turma::create($request->all());

        \Session::flash('flash_message', 'Registro inserido com sucesso!');

        return redirect('turmas');
    }

    public function edit($id)
    {
        $turma = Turma::findOrFail($id);

        return view('turmas.edit', compact('turma'));
    }

    public function update($id, Request $request)
    {
        Turma::findOrFail($id)->update($request->all());

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
