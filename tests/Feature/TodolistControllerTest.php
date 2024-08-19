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

    public function testAddTodolistFailed()
    {
        $this->withSession([
            "user" => "andrew"
        ])->post("/todolist", [])
            ->assertSeeText("Todo is required");
    }

    public function testAddTodolistSuccess()
    {
        $this->withSession([
            "user" => "andrew"
        ])->post("/todolist", [
            "id" => "todo-1",
            "todo" => "Belajar Laravel"
        ])->assertRedirect("/todolist")
            ->assertStatus(302);
    }

    public function testRemoveTodolist()
    {
        $this->withSession([
            "user" => "andrew",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Belajar"
                ],
                [
                    "id" => "2",
                    "todo" => "Belajar"
                ]
            ]
        ])->post("/todolist/1/delete")
            ->assertRedirect("/todolist");
    }
}
