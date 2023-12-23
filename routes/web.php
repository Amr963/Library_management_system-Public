<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'index']);
Route::prefix('/archive')->group(function () {
    Route::get('/book',[BookController::class, 'archive'])->name('archive.book');
});
Route::post('/book/restore/{id}',[BookController::class, 'restore'])->withTrashed(['restore'])->name('book.restore');
Route::resource('/author',AuthorController::class);
Route::resource('/book', BookController::class)->withTrashed(['destroy']);


Auth::routes();



