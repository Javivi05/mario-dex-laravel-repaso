<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Personaje;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MarioTest extends TestCase
{
    use RefreshDatabase;

    
    public function test_crear_personaje()
    {
        $personaje = Personaje::create([
            'nombre' => 'Mario',
            'tipo' => 'Héroe',
            'poder' => 5,
            'mundo' => 'Reino Champiñon'
        ]);

        $this->assertDatabaseHas('personajes', [
            'nombre' => 'Mario'
        ]);
    }

    public function test_actualizar_personaje()
    {
        $personaje = Personaje::create([
            'nombre' => 'Mario',
            'tipo' => 'Héroe',
            'poder' => 5,
            'mundo' => 'Reino Champiñon'
        ]);

        $personaje->update([
            'nombre' => 'Luigi',
            'poder' => 10
        ]);

        $this->assertDatabaseHas('personajes', [
            'nombre' => 'Luigi',
            'poder' => 10
        ]);
    }
    public function test_eliminar_personaje()
    {
        $personaje = Personaje::create([
            'nombre' => 'Mario',
            'tipo' => 'Héroe',
            'poder' => 5,
            'mundo' => 'Reino Champiñon'
        ]);

        $personaje->delete();

        $this->assertDatabaseMissing('personajes', [
            'nombre' => 'Mario'
        ]);
    }
    public function test_validacion_datos()
    {
        $response = $this->postJson('/api/personajes', [
            'nombre' => '',
            'tipo' => '',
            'poder' => 0,
            'mundo' => ''
        ]);

        $response->assertStatus(422);
    }
    public function test_get_personajes_devuelve_200()
    {
        $response = $this->getJson('/api/personajes');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'nombre', 'tipo', 'poder', 'mundo']
        ]);
    }
}