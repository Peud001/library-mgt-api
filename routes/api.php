<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCopiesController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('authors', AuthorController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('publishers', PublisherController::class);
Route::apiResource('book-copies', BookCopiesController::class);
Route::apiResource('borrowing', BorrowingController::class);
