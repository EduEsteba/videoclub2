<?php

namespace Tests\Feature\Http\Controllers\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Movie;

class Editar_Pelicula extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function Editar_Pelicula(){
        $this->withoutExceptionHandling();
        $response = $this->withoutMiddleware()->put('catalog/edit/1', [
            'title' => 'testeo',
            'year' => '9999',
            'director' => 'Eduard',
            'synopsis' => 'blablabla',
            'category' => 3,
            'trailer' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ]);

        $this->assertDatabaseHas('movies', [
            'title' => 'testeo',
            'year' => '9999',
            'director' => 'Eduard',
            'synopsis' => 'hola',
        ]);
    }
   
}
