<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});



// Offer login button, view posts button
Route::get('/', function () {
    return "This is the blog's home page.";
});

// Main page with everyone's posts
Route::get('/posts', function () {
    return "This is the blog's home page.";
});

/*
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
*/

// Create new post
Route::get('/newpost', function () {
    return view('newpost');
})->middleware(['auth']);

// View a user's profile, posts & comments
Route::get('/profile/{username}', function($name) {
    return "This is $username's blog page.";
});

// View a user's profile, posts & comments by id
Route::get('/profile/{id}', [UserController::class, 'show']);

// View all users
Route::get('/users', [UserController::class, 'index']);

// Direct link to a post
Route::get('/viewpost/{postid}', function () {
    return "Post ID: $postid";
});

// Direct link to a comment within a post
Route::get('/viewpost/{postid}#{commentid}', function () {
    return "Comment ID: $commentid";
});

// Redirect users looking for the 'blog' page to the correct home page
Route::redirect('/blog', '/home');

// Nullable example
Route::get('/user/{name?}', function($name = '|John') {
    return "User = $name";
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
