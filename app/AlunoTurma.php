<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoTurma extends Model
{
    protected $fillable = [
        'aluno_id',
        'turma_id',
    ];

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }

    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }
}
