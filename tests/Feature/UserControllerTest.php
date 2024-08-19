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
}
