<?php

namespace App\Services;

interface TodolistService
{

    public function saveTodolist(string $id, string $name): void;
    public function getTodolistAll(): array;
    public function removeTodo(string $todoId);
}
