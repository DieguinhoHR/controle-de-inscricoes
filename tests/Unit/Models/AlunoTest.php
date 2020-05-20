<?php

namespace Tests\Unit\Models;

use App\Aluno;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    public function testFillable()
    {
        $fillable = ['nome', 'sexo', 'data_nascimento'];
        $this->assertEquals($fillable, (new Aluno())->getFillable());
    }

    public function testDates()
    {
        $dates = ['data_nascimento', 'created_at', 'updated_at'];
        $this->assertEquals($dates, (new Aluno())->getDates());
    }
}
