<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'sexo',
    ];

    protected $dates = [
        'data_nascimento'
    ];
}
