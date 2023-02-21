<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
  return view('welcome');
}); */

Route::get('/', function () {
  return view('layouts.app');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');

Route::post('/temp-upload', [PostController::class, 'tempUplaod']);
Route::delete('/temp-delete', [PostController::class, 'tempDelete']);