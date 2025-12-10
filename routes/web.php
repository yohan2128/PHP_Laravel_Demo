<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userHub\AuthController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () {
    return view('welcome');
});

//region Route to display the main page of the user hub
Route::get('/userHub', function () {
    return view('userHub.index');
})->name('userHub.index');

// Route to display the About page in the user hub
Route::get('/userHub/about', function () {
    return view('userHub.about');
})->name('userHub.showAbout');

// Route to display the Sign Up page in the user hub
Route::get('/userHub/signUp', function () {
    return view('userHub.signUp');
})->name('userHub.showSignUp');

// Route to handle the Sign Up form submission
Route::post('/signUp', [AuthController::class, 'signUp']); // placeholder for sign-up logic

// Route to display the Sign In page in the user portal
Route::get('/userHub/signIn', function () {
    return view('userHub.signIn');
})->name('userHub.showSignIn');

// Route to handle the Sign In form submission
Route::post('/userHub/signIn/Auth', [AuthController::class, 'signIn'])->name('userHub.signInAuth'); // sign-in logic

// Route to handle the Sign Out action
Route::post('/signOut', [AuthController::class, 'signOut'])->name('userHub.signOut'); // sign-out logic

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