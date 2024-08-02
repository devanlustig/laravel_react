<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/posts', \App\Http\Controllers\PostController::class);
use App\Http\Controllers\UserController;

Route::get('/listUsers', [UserController::class, 'listUsers'])->name('listUsers');
Route::get('/get-users', [UserController::class, 'getUsers'])->name('get.users');



Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses.login');
    Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses.register');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('postsearch', [\App\Http\Controllers\PostController::class, 'search'])->name('postsearch');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
