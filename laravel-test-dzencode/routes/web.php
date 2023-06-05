<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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

Route::get('/', [CommentController::class, 'index'])->name('comments.index');
Route::get('/reload-captcha', [CommentController::class, 'reloadCaptcha'])->name('comments.reload-captcha');
Route::post('/store', [CommentController::class, 'store'])->name('comments.store');