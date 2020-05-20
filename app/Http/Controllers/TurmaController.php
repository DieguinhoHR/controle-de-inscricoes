<?php

namespace App\Http\Controllers;

use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    private const LIMIT_BY_PAGE = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $turmas = Turma::orderBy('created_at', 'desc')->paginate(self::LIMIT_BY_PAGE);

        $nomeDaTurma = $request->get('nome');

        if ($nomeDaTurma) {
            $turmas = Turma::where('nome', 'like', "%$nomeDaTurma%")
                ->orderBy('created_at', 'desc')
                ->paginate(self::LIMIT_BY_PAGE);
        }
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        Turma::create($request->all());

        $request->session()->flash('flash_message', 'Registro inserido com sucesso!');

        return redirect('turmas');
    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {
        dd($id);
    }
}
