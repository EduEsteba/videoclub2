<?php

namespace Tests\Feature\Http\Controllers\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Movie;

class pelicula_api extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function add_movieWithApi(){
        $this->withoutExceptionHandling();
        
        $response = $this->withoutMiddleware()->post(route('api.store'), [
            'title' => 'testeo',
            'year' => '9999',
            'director' => 'Eduard',
            'synopsis' => 'Ese vallejo',
            'category' => 1,
            'trailer' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ]);

        $response->assertStatus(200);
    }
}
