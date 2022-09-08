<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

require __DIR__ . '/auth.php';

Route::get('/', HomeController::class)->name('index');

Route::put('comments/store', [CommentController::class, 'store'])->name('comments.store');
// Route::delete('comments/{comment}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('{id}', [PostController::class, 'show'])->name('posts.show');
});