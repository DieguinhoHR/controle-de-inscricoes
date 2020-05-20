<?php

namespace Tests\Unit\Models;

use App\Turma;
use PHPUnit\Framework\TestCase;

class TurmaTest extends TestCase
{
    public function testFillable()
    {
        $fillable = ['nome'];
        $this->assertEquals($fillable, (new Turma())->getFillable());
    }
}
