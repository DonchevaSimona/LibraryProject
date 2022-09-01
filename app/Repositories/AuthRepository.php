<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthRepository implements Interfaces\AuthRepositoryInterface
{

    public function user($email)
    {
        return User::where('email', $email)->get();
    }


    public function get_currently_rented_books_for_user($user_id)
    {
        return DB::table('user_book')
            ->leftJoin('books', 'user_book.book_id', '=', 'books.id')
            ->select('books.*')
            ->where('user_book.user_id', $user_id)
            ->where('books.available', '=', 0)
            ->distinct()
            ->get();
    }

    public function get_all_rented_books_for_user($user_id)
    {
        return DB::table('user_book')
            ->leftJoin('books', 'user_book.book_id', '=', 'books.id')
            ->select('books.*')
            ->where('user_book.user_id', $user_id)
            ->distinct()
            ->get();
    }
}
