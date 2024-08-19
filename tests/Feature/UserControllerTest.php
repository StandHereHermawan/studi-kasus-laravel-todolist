<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testViewLoginPage()
    {
        $this->get('/login')
            ->assertSeeText("Login")
            ->assertSeeText("User")
            ->assertSeeText("Password")
            ->assertSeeText("Programmer")
            ->assertSeeText("Sign")
            ->assertSeeText("In");
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "andrew",
            "password" => "rasis@born"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "andrew");
    }

    public function testLoginValidationError()
    {
        $this->post('/login', [])
            ->assertSeeText("Username or password is required")
            ->assertSeeText("Login")
            ->assertSeeText("User")
            ->assertSeeText("Password")
            ->assertSeeText("Programmer")
            ->assertSeeText("Sign")
            ->assertSeeText("In");
    }

    public function testLoginWrongUsernameOrPassword()
    {
        $this->post('/login', [
            "user" => "oke",
            "password" => "oke"
        ])
            ->assertSeeText("Username or password is wrong")
            ->assertSeeText("Login")
            ->assertSeeText("User")
            ->assertSeeText("Password")
            ->assertSeeText("Programmer")
            ->assertSeeText("Sign")
            ->assertSeeText("In");
    }

    public function testLogoutSuccess()
    {
        $this->withSession([
            "user" => "andrew"
        ])->post("/logout")
            ->assertRedirect("/")
            ->assertSessionMissing("user");
    }
}
