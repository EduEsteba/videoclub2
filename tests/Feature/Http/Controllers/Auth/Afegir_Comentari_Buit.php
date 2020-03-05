<?php

namespace Tests\Feature\Http\Controllers\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Movie;

class Afegir_Comentari_Buit extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_post_empty_comment(){
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/review/create/1', []);
        $response->assertStatus(419);
    }
}
