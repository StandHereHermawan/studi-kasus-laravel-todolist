<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    public function setUp(): void
    {
        parent::setUp();

        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testSetUpFunction()
    {
        self::assertTrue(true);
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodolistSuccess()
    {
        $this->todolistService->saveTodolist("todo1", "Belajar Laravel Dasar");

        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            self::assertEquals("todo1", $value['id']);
            self::assertEquals("Belajar Laravel Dasar", $value['todo']);
        }
    }

    public function testGetTodolistEmpty()
    {
        self::assertEquals([], $this->todolistService->getTodolistAll());
    }

    public function testGetTodolistSuccess()
    {
        $expected = [
            [
                "id" => "todo1",
                "todo" => "Belajar"
            ],
            [
                "id" => "todo2",
                "todo" => "Belajar"
            ]
        ];

        $this->todolistService->saveTodolist($expected[0]['id'], $expected[0]['todo']);
        $this->todolistService->saveTodolist($expected[1]['id'], $expected[1]['todo']);

        self::assertNotNull($this->todolistService->getTodolistAll());
        self::assertEquals($expected, $this->todolistService->getTodolistAll());
    }
}
