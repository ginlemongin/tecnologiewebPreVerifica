<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\EditorsController;
use App\Http\Controllers\AuthorsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//rotte books
Route::post('/books', [BooksController::class, 'create']);
Route::delete('/books/{id}', [BooksController::class, 'delete']);
Route::get('/books/{id}', [BooksController::class, 'read']);
Route::get('/books', [BooksController::class, 'readAll']);
Route::put('/books/{id}', [BooksController::class, 'update']);

//rotte editors
Route::post('/editors', [EditorsController::class, 'create']);
Route::delete('/editors/{id}', [EditorsController::class, 'delete']);
Route::get('/editors/{id}', [EditorsController::class, 'read']);
Route::get('/editors', [EditorsController::class, 'readAll']);
Route::put('/editors/{id}', [EditorsController::class, 'update']);

//authors editors
Route::post('/authors', [AuthorsController::class, 'create']);
Route::delete('/authors/{id}', [AuthorsController::class, 'delete']);
Route::get('/authors/{id}', [AuthorsController::class, 'read']);
Route::get('/authors', [AuthorsController::class, 'readAll']);
Route::put('/authors/{id}', [AuthorsController::class, 'update']);
