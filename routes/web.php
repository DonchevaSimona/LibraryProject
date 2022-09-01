<?php

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
Route::post('/login', [ApplicationController::class, 'login'])->name('login');
Route::get('get_rented_books_for_user', [ApplicationController::class, 'get_rented_books_for_user']);


Route::get('get_all_books', [\App\Http\Controllers\BookController::class, 'get_all_books']);
Route::post('rent_book', [\App\Http\Controllers\BookController::class, 'rent_book']);
Route::post('return_book', [\App\Http\Controllers\BookController::class, 'return_book']);




Route::get('/{any}', [ApplicationController::class, 'index'])->where('any', '.*');
