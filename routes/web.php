<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ApplicationController
Route::post('/login', [ApplicationController::class, 'login'])->name('login');
Route::get('get_rented_books_for_user', [ApplicationController::class, 'get_rented_books_for_user']);


//BookController
Route::get('get_all_books', [BookController::class, 'get_all_books']);
Route::post('rent_book', [BookController::class, 'rent_book']);
Route::post('return_book', [BookController::class, 'return_book']);
Route::post('donate_book', [BookController::class, 'donate_book']);




Route::get('/{any}', [ApplicationController::class, 'index'])->where('any', '.*');
