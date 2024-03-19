<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class,'index'])->name('home')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
});
require __DIR__ . '/auth.php';
