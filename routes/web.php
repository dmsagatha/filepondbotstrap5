<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
  return view('welcome');
}); */

Route::get('/inicial', function () {
  return view('app');
});

Route::get('/', [PostController::class, 'index']);
Route::post('post/store', [PostController::class, 'store'])->name('post.store');

Route::post('/temp-upload', [PostController::class, 'tempUplaod']);
Route::delete('/temp-delete', [PostController::class, 'tempDelete']);