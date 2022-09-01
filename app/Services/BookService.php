<?php

namespace App\Services;

use App\Repositories\Interfaces\BookRepositoryInterface;

class BookService
{
    public function __construct(
        BookRepositoryInterface $book,
    )
    {
        $this->book = $book;
    }

    public function get_all_books()
    {
        return $this->book->get_all_books();
    }

    public function rent_book($request)
    {
        $this->book->change_available_status($request->id, false);
        $this->book->bind_book_to_user($request);
    }

    public function return_book($id)
    {
        $this->book->change_available_status($id, true);
    }

    public function donate_book($request)
    {
        $this->book->donate_book($request);
    }

}
