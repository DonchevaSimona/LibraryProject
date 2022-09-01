<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function login(Request $request)
    {
        return $this->auth->login_user($request);
    }

    public function get_rented_books_for_user(Request $request)
    {
        return $this->auth->get_rented_books_for_user($request);
    }
}
