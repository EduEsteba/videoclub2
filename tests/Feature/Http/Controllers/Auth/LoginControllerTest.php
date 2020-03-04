<?php

namespace Tests\Feature\Http\Controllers\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Movie;

class LoginControllerTest extends TestCase
{
  
    
    public function login_authenticates_and_redirects_user()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('catalog.index'));
        $this->assertAuthenticatedAs($user);
    }

    
    public function login_displays_validation_errors()
    {
        $response = $this->post(route('login'), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }
    
    public function login_displays_the_login_form()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

   

    public function test_user_post_empty_comment()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->post('/review/create/1', []);

        $response->assertStatus(419);

    }

    public function PUT_Renturn()
    {

        $response = $this->withoutMiddleware()->put(route('putReturn', ['id' => 1]));

        $response->assertStatus(200);
    }

    public function PUT_Rent()
    {

        $response = $this->withoutMiddleware()->put(route('putRent', ['id' => 1]));

        $response->assertStatus(200);
    }

   
  

}