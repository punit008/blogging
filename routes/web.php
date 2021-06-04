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


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/store', [LoginController::class, 'store'])->name('auth.login.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('auth.register.store');
});


Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/', [BlogController::class, 'index'])->name('dashboard');
    Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
