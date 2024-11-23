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
Route::get('/gigs', [GigController::class, 'create']);
Route::post('/gigs', [GigController::class, 'store']);
Route::get('/gigs/{gig}/edit', [GigController::class, 'edit']);
Route::post('/gigs/{gig}/edit', [GigController::class, 'update']);
Route::get('/gigs/{gig}/delete', [GigController::class, 'delete']);
Route::get('/gigs/{gig}', [GigController::class, 'show']);

Route::get('/search', [GigController::class, 'search']);

Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/manage', [UserController::class, 'manage']);
