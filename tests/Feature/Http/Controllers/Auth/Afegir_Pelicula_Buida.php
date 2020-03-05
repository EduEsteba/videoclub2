<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Afegir_Pelicula_Buida extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function afegirpeliculabuida(){
        $this->withoutExceptionHandling();
        $response = $this->withoutMiddleware()->post['/catalog/create'];
        $response->assertStatus(302);
    }
}
