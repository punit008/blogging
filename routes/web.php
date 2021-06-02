<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
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

Route::get('/', [BlogController::class, 'index'])->name('dashboard');

Route::get('/login', [PostController::class, 'login_view'])->name('auth.login');
Route::post('/login/store', [PostController::class, 'login'])->name('auth.store');

Route::get('/register', [PostController::class, 'register_view'])->name('auth.register');
Route::post('/register/store', [PostController::class, 'register'])->name('auth.register.store');

Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/logout', [PostController::class, 'logout'])->name('logout');
