<?php

namespace App\Http\Controllers;

use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();

        return view('layouts.turmas.index', ['turmas' => $turmas]);
    }
}
