<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testViewPageTodolist()
    {
        $this->withSession([
            "user" => "andrew",
            "todolist" => [
                "id" => "1",
                "todo" => "Belajar"
            ],
            [
                "id" => "2",
                "todo" => "Belajar"
            ]
        ])->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("2")
            ->assertSeeText("Belajar");
    }
}
