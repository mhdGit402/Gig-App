<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GigController;
use App\Http\Controllers\UserController;
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

Route::get('/', [GigController::class, 'index'])->name('index');
Route::get('/gigs', [GigController::class, 'create'])->middleware('auth');
Route::post('/gigs', [GigController::class, 'store'])->middleware('auth');
Route::get('/gigs/{gig}/edit', [GigController::class, 'edit'])->middleware('auth');
Route::post('/gigs/{gig}/edit', [GigController::class, 'update'])->middleware('auth');
Route::get('/gigs/{gig}/delete', [GigController::class, 'delete'])->middleware('auth');
Route::get('/gigs/{gig}', [GigController::class, 'show']);

Route::get('/search', [GigController::class, 'search']);

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'registration'])->name('register')->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/manage', [UserController::class, 'manage'])->name('manage')->middleware('auth');
