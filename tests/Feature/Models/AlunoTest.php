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

//    public function testCreate()
//    {
//        $turma = Turma::create(['nome' => 'Test']);
//
//        $this->assertDatabaseHas('turmas', ['nome' => 'Test']);
//        $this->assertEquals('Test', $turma->nome);
//    }
//
//    public function testUpdate()
//    {
//        $turma = Turma::create(['nome' => 'Test 2']);
//
//        $turma = Turma::find($turma->id);
//        $turma->update(['nome' => 'Test 3']);
//
//        $this->assertEquals('Test 3', $turma->nome);
//    }
//
//    public function testDelete()
//    {
//        $turma = factory(Turma::class)->create();
//        $turma->delete();
//        $this->assertNull(Turma::find($turma->id));
//    }
}
