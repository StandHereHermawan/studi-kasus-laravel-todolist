<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todolist(Request $request)
    {
        $todolist = $this->todolistService->getTodolistAll();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    public function addTodolist(Request $request)
    {
        $todo = $request->input("todo");

        if (empty($todo)) {
            $todolist = $this->todolistService->getTodolistAll();
            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }

        $this->todolistService->saveTodolist(uniqid(), $todo);

        return redirect()->action([TodolistController::class, "todolist"]);
    }

    public function removeTodolist(Request $request, string $todoId) {}
}
