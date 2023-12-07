<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

// Default
Route::get('/', function () {
    return view('welcome');
});

// Redirect users looking for the 'blog' page to the correct home page
Route::redirect('/blog', '/home');

// Offer login button, view posts button
Route::get('/', function () {
    return "This is the blog's home page.";
});

// Main page with everyone's posts
Route::get('/posts', function () {
    return "This is the blog's home page.";
});


// ------------------------------------------------------------


// Create new post
Route::get('posts/create', [PostController::class, 'create'])->name('post.create');
//Route::get('posts/create', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');

// Store the created post
Route::post('/posts', [PostController::class, 'store'])->name('post.store');


// ------------------------------------------------------------


// View a post by ID
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

// View all posts
Route::get('/posts', [PostController::class, 'index'])->name('post.index');


// ------------------------------------------------------------


// View a user's profile, posts & comments by id
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

// View all users
Route::get('/users', [UserController::class, 'index'])->name('user.index');


// ------------------------------------------------------------


// Edit post
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

// Store the edited post
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

// Delete post
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');


// ------------------------------------------------------------


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ------------------------------------------------------------

// --- BINNED ---

/*
// Direct link to a comment within a post
Route::get('/post/{postid}#{commentid}', function () {
    return "Comment ID: $commentid";
});

// Login existing user
Route::get('/login', function () {
    return view('login');
});

// Register new user
Route::get('/register', function () {
    return view('register');
});

// Forgot password
Route::get('/passwordreset', function () {
    return view('passwordreset');
});

// Nullable example
Route::get('/user/{name?}', function($name = '|John') {
    return "User = $name";
});
*/