<?php

namespace Tests\Feature\Models;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TurmaControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();

        $user = factory(User::class)->make();
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get(route('turmas.index'));
        $response->assertStatus(200)
                 ->assertSee('Turmas')
                 ->assertSee('Listagem de turmas')
                 ->assertSee('ID')
                 ->assertSee('Nome')
                 ->assertSee('Data criação')
                 ->assertSee('Ações');
    }

    public function testInvalidationData()
    {
        $response = $this->json('POST', route('turmas.store'), []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nome']);
    }
}
