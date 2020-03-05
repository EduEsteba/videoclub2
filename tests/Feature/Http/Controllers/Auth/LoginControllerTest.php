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
   /** @test */
    public function login_displays_the_login_form()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(302);
        $response->assertViewIs('auth.login');
    }
}