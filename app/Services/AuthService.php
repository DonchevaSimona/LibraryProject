<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService
{
    public function __construct(
        AuthRepositoryInterface $auth
    ) {
        $this->auth = $auth;
    }

    public function login_user($request)
    {
        $credentials = request(['email', 'password']);
        if (!auth('web')->attempt($credentials)) {
            return false;
        } else {
            return true;
        }
    }
}
