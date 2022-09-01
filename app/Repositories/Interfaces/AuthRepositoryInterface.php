<?php

namespace App\Repositories\Interfaces;

interface AuthRepositoryInterface
{
    public function user($email);

    public function get_currently_rented_books_for_user($user_id);

    public function get_all_rented_books_for_user($user_id);
}
