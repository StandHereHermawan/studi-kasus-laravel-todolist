<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testHomeCtrlrGuest()
    {
        $this->get("/")
            ->assertRedirect("/login");
    }

    public function testHomeCtrlrMember()
    {
        $this->withSession([
            "user" => "andrew"
        ])->get("/")
            ->assertRedirect("/todolist");
    }
}
