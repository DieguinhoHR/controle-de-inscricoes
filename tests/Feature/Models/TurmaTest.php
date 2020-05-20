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
        factory(Turma::class)->create();
        $this->assertCount(1, Turma::all());
    }
}
