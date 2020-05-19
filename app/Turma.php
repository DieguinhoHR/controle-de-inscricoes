<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['nome'];

    public function getNomeAttribute($value)
    {
        return ucfirst($value);
    }
}
