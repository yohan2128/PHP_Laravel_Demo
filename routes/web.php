<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

//region Route to display the main page of the user portal
Route::get('/userPortal', function () {
    return view('userPortal.index');
})->name('userPortal.index');

// Route to display the About page in the user portal
Route::get('/userPortal/about', function () {
    return view('userPortal.about');
})->name('userPortal.showAbout');

// Route to display the Sign Up page in the user portal
Route::get('/userPortal/signUp', function () {
    return view('userPortal.signUp');
})->name('userPortal.showSignUp');

// Route to handle the Sign Up form submission
Route::post('/signUp', [UserController::class, 'register']); // placeholder for sign-up logic

// Route to display the Sign In page in the user portal
Route::get('/userPortal/signIn', function () {
    return view('userPortal.signIn');
})->name('userPortal.showSignIn');

// Route to handle the Sign In form submission
Route::post('/signIn', [UserController::class, 'login']); // placeholder for sign-in logic
//endregion Route to display the main page of the user portal

//region Laravel CRUD tutorial example
Route::get('/CRUD', function () {
    $posts = [];
    if (auth('web')->check()) {
        $posts = auth('web')->user()->userPosts()->latest()->get();
    }
    //$posts = Post::all();
    return view('CRUD.index', ['posts' => $posts]);
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