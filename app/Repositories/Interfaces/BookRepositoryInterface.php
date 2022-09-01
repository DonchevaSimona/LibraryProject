<?php

namespace App\Repositories\Interfaces;

interface BookRepositoryInterface
{
    public function get_all_books();

    public function change_available_status($id, $status);

    public function bind_book_to_user($request);

}
