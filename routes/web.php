<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
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

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('user_posts', UserPostController::class);
});


require __DIR__.'/auth.php';
