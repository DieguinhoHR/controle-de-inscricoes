<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'sexo',
        'data_nascimento'
    ];

    protected $dates = [
        'data_nascimento'
    ];

    public function getNomeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDataNascimentoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getSexoAttribute($value)
    {
        return $value === 'M' ? 'Masculino' : 'Feminino';
    }

    public function turmas()
    {
        return $this->belongsToMany('Turma', 'aluno_turma');
    }
}
