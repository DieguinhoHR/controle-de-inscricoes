<?php

namespace Tests\Feature\Models;

use App\Aluno;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AlunoTest extends TestCase
{
    use DatabaseMigrations;

    public function testList()
    {
        $aluno = factory(Aluno::class)->create();
        $this->assertCount(1, Aluno::all());

        $fields = array_keys($aluno->getAttributes());
        $this->assertEqualsCanonicalizing([
            'id',
            'nome',
            'sexo',
            'data_nascimento',
            'created_at',
            'updated_at'
        ], $fields);
    }

    public function testCreate()
    {
        $aluno = Aluno::create([
            'nome' => 'Test',
            'sexo' => 'M',
            'data_nascimento' => '1986-08-07'
        ]);

        $this->assertDatabaseHas('alunos', [
            'nome' => 'Test',
            'sexo' => 'M',
            'data_nascimento' => '1986-08-07 00:00:00'
        ]);
        $this->assertEquals('Test', $aluno->nome);
    }

    public function testUpdate()
    {
        $turma = Aluno::create(['nome' => 'Test 2']);

        $turma = Aluno::find($turma->id);
        $turma->update(['nome' => 'Test 3']);

        $this->assertEquals('Test 3', $turma->nome);
    }
//
//    public function testDelete()
//    {
//        $turma = factory(Turma::class)->create();
//        $turma->delete();
//        $this->assertNull(Turma::find($turma->id));
//    }
}
