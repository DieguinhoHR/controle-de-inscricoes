<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('/turmas', 'TurmaController');
Route::resource('/alunos', 'AlunoController');

