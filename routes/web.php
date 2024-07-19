<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

// Auth routes
Auth::routes();

// Public routes
Route::get('/', [BerandaController::class, 'index']);
Route::get('/home', [BerandaController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Authentication routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('akun', [AkunController::class, 'index'])->name('akun.index');
    Route::get('akun/create', [AkunController::class, 'create'])->name('akun.create');
    Route::post('akun', [AkunController::class, 'store'])->name('akun.store');
    Route::get('akun/{akun}', [AkunController::class, 'show'])->name('akun.show');
    Route::get('akun/{akun}/edit', [AkunController::class, 'edit'])->name('akun.edit');
    Route::put('akun/{akun}', [AkunController::class, 'update'])->name('akun.update');
    Route::delete('akun/{akun}', [AkunController::class, 'destroy'])->name('akun.destroy');
});
