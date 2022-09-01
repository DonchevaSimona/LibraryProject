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
        if (auth()->attempt($credentials)) {
                    return $this->auth->user($request->email);
                } else {
                    return false;
                }
    }


    public function get_rented_books_for_user($request)
    {
        if ($request->flag == 'current'){
            return $this->auth->get_currently_rented_books_for_user($request->user_id);
        }else {
            return $this->auth->get_all_rented_books_for_user($request->user_id);
        }
    }
}
