<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Controllers\Traits\TraitController;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    use TraitController;

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
}
