<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private array $users = [
        "andrew" => "rasis@born"
    ];

    function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        // if ($password == $correctPassword) {
        //     return true;
        // } else {
        //     return false;
        // }
        
        return $password == $correctPassword;
    }
}
