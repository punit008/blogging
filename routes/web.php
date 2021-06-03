<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('auth.login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('auth.register.store');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/', [BlogController::class, 'index'])->name('dashboard');
    Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});



// Route::get('/post', [PostController::class, 'index'])->name('post.index');
// Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
// Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
// Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
// Route::post('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');


