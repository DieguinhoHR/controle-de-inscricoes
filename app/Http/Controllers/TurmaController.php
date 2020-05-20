<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\TraitController;
use App\Http\Requests\TurmaRequest;
use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    use TraitController;

    public function __construct()
    {
        $this->data = [
            'view_index' => 'turmas.index',
            'view_create' => 'turmas.create',
            'view_edit' => 'turmas.edit',
            'redirect_to' => 'turmas',
            'model' => new Turma
        ];
    }


}
