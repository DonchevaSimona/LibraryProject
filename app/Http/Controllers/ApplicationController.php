<?php

namespace App\Http\Controllers;


use App\Requests\LoginValidationRequest;
use App\Services\AuthService;
use App\User;

class ApplicationController extends Controller
{
    public function __construct(
        AuthService $auth
    ) {
        $this->auth = $auth;
    }

    public function index()
    {
        return view('application');
    }

    public function login(LoginValidationRequest $request)
    {
        $validated = $request->validated();
        return $this->auth->login_user($validated);
    }
}
