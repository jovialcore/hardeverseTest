<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/external-books', [App\Http\Controllers\Api\BookController::class, 'list']);

Route::post('/v1/books', [App\Http\Controllers\Api\BookController::class, 'create']);

Route::get('/v1/books', [App\Http\Controllers\Api\BookController::class, 'read']);

Route::put('/v1/books/{id}', [App\Http\Controllers\Api\BookController::class, 'update']);

Route::delete('/v1/books/{id}', [App\Http\Controllers\Api\BookController::class, 'delete']);

Route::get('/v1/books/{id}', [App\Http\Controllers\Api\BookController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
