<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show'); 
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('post.create'); 
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('post.store'); 
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show'); 
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit'); 
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update'); 
Route::get('/p/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('post.edit'); 
Route::patch('/p/{post}', [App\Http\Controllers\PostsController::class, 'update'])->name('post.update'); 
Route::get('/delete/{post}', [App\Http\Controllers\PostsController::class, 'delete'])->name('post.delete'); 
Route::post('/sent/{post}', [App\Http\Controllers\CommentsController::class, 'store'])->name('comment.store'); 