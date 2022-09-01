<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        BookService $book
    ) {
        $this->book = $book;
    }

    public function get_all_books()
    {
        return $this->book->get_all_books();
    }

    public function rent_book(Request $request)
    {
        $this->book->rent_book($request);
    }

    public function return_book(Request $request)
    {
        $this->book->return_book($request->id);
    }
}
