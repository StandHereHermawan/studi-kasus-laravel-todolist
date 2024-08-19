<?php

namespace App\Services;

interface TodolistService
{

    public function saveTodolist(string $id, string $name): void;
}
