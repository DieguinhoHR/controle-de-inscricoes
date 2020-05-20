<?php

namespace Tests\Feature\Models;

use App\Turma;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TurmaTest extends TestCase
{
    use DatabaseMigrations;

    public function testList()
    {
        $turma = factory(Turma::class)->create();
        $this->assertCount(1, Turma::all());

        $fields = array_keys($turma->getAttributes());
        $this->assertEqualsCanonicalizing([
            'id',
            'nome',
            'created_at',
            'updated_at'
        ], $fields);
    }

    public function testCreate()
    {
        $turma = Turma::create(['nome' => 'Test']);

        $this->assertDatabaseHas('turmas', ['nome' => 'Test']);
        $this->assertEquals('Test', $turma->nome);
    }

    public function testUpdate()
    {
        $turma = Turma::create(['nome' => 'Test 2']);

        $turma = Turma::find($turma->id);
        $turma->update(['nome' => 'Test 3']);

        $this->assertEquals('Test 3', $turma->nome);
    }

    public function testDelete()
    {
        $turma = factory(Turma::class)->create();
        $turma->delete();
        $this->assertNull(Turma::find($turma->id));
    }
}
