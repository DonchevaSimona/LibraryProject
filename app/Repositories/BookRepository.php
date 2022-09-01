<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookRepository implements Interfaces\BookRepositoryInterface
{

    public function get_all_books()
    {
        return Book::all();
    }

    public function change_available_status($id, $status)
    {
        $book = Book::find($id);
        $book->available = $status;
        $book->save();
    }

    public function bind_book_to_user($request)
    {
        $bind = [
            'user_id' => $request->user_id,
            'book_id' => $request->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('user_book')->insert($bind);
    }

    public function donate_book($request)
    {
        $book = [
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'year_of_publish' => $request->year_of_publish,
            'available' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        Book::insert($book);
    }
}
