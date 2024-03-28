<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;

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
require __DIR__ . '/auth.php';
Route::get('/', [PostController::class, 'index'])->name('home')->middleware('auth');
Route::get('/explorer', [PostController::class, 'explorer'])->name('explorer');

Route::middleware('auth')->group(function () {
    Route::get('/{user:username}/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::get('/{user:username}', [UserController::class, 'show'])->name('username');
    Route::patch('/{user:username}', [UserController::class, 'update'])->name('profile.update');
});
Route::prefix('/post')->middleware('auth')->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/create', 'create')->name('post.create');
        Route::post('/', 'store')->name('post.store');
        Route::get('/{post:slug}', 'show')->name('post.show');
        Route::delete('/{post:slug}', 'destroy')->name('post.destroy');
        Route::get('/edit/{post:slug}', 'edit')->name('post.edit');
        Route::put('/{post:slug}', 'update')->name('post.update');
    });
    Route::post('/{post:slug}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/{post:slug}/like', LikeController::class)->name('like');
});
