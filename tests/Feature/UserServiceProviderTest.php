<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceProviderTest extends TestCase
{
    private UserService $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testSetUpFunction()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("andrew", "rasis@born"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("gaada", "gaada"));
    }

    public function testLoginUserWrongPassword()
    {
        self::assertFalse($this->userService->login("andrew", "gaada"));
    }
}
