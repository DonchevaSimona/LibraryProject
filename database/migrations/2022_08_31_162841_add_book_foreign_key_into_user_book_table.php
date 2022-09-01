<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookForeignKeyIntoUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_book', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->after('id');
            $table->foreign('book_id', 'user_book_book_id_foreign')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_book', function (Blueprint $table) {
            $table->dropForeign(['user_book_book_id_foreign']);
            $table->dropColumn('book_id');
        });
    }
}
