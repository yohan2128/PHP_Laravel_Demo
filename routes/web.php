<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/cssTest', function () {
    return view('cssTest');
})->name('cssTest');

//region Laravel CRUD tutorial example
Route::get('/home', function () {
    $posts = [];
    if (auth('web')->check()) {
        $posts = auth('web')->user()->userPosts()->latest()->get();
    }
    //$posts = Post::all();
    return view('home', ['posts' => $posts]);
});

//USER Register, logIn, logOut
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//USER POST
Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'showEditPost']);
Route::put('/edit-post/{post}', [PostController::class, 'editPost']);
Route::get('/cancel-edit', [PostController::class, 'cancelEdit']);

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
//endregion Laravel CRUD tutorial example