<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $alunos = Aluno::orderBy('created_at', 'desc')->paginate(10);

        $nome = $request->get('nome');

        if ($nome) {
            $alunos = Aluno::where('nome', 'like', "%$nome%")->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('alunos.index', compact('nome', 'alunos'));
    }
}
