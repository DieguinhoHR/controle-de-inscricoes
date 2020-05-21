<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Controllers\Traits\TraitController;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    use TraitController;

    /**
     * AlunoController constructor.
     */
    public function __construct()
    {
        $this->data = [
            'view_index' => 'alunos.index',
            'view_create' => 'alunos.create',
            'view_edit' => 'alunos.edit',
            'redirect_to' => 'alunos',
            'model' => new Aluno
        ];
    }

    public function index(Request $request)
    {
        $data = $this->data['model']->orderBy('created_at', 'desc')->paginate(5);
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

//    public function store(Request $request)
//    {
//        $this->data['model']->create($request->all());
//
//        \Session::flash('flash_message', 'Registro inserido com sucesso!');
//
//        return redirect($this->data['redirect_to']);
//    }
}
