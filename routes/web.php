<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {return redirect('/posts');})->name('posts.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::Post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/view/{postId}', [PostController::class, 'view'])->name('posts.view');
Route::get('/posts/edit/{postId}', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/edit/{postId}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/delete/{postId}', [PostController::class, 'delete'])->name('posts.delete');
Route::get('/posts/flush', [PostController::class, 'flush'])->name('posts.flush');

// Comments Routes
Route::post('/comments/{postId}', [CommentController::class, 'add'])->name('comments.add');
Route::delete('/comments/{postId}/{commentId}', [CommentController::class, 'delete'])->name('comments.delete');
Route::get('/comments/{postId}/{commentId}', [CommentController::class, 'view'])->name('comments.view');
Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
