<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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

Route::redirect('/', '/login');

Route::controller(AuthController::class)->group(function () {
    // Login
    Route::match(['get', 'post'], '/login', 'login');
    // Registration
    Route::match(['get', 'post'], '/register', 'register');
    // Logout
    Route::get('/logout', 'logout');
});

Route::controller(PostController::class)->group(function () {
    // Posts
    Route::get('/posts', 'list')->name('posts');
    // Post's actions
    Route::prefix('post')->group(function () {
        // View post
        Route::get('/{id}', 'show')
            ->where('id', '[0-9]+');
        // Create post
        Route::match(['get', 'post'], '/create', 'create');
        // Update post
        Route::match(['get', 'post'], '/update/{id}', 'update')
            ->where('id', '[0-9]+');
        // Delete post
        Route::get('/delete/{id}', 'delete')
            ->where('id', '[0-9]+');
        // Like post
        Route::get('/like/{id}', 'like')
            ->where('id', '[0-9]+');
        // Dislike post
        Route::get('/dislike/{id}', 'dislike')
            ->where('id', '[0-9]+');
    });
});
