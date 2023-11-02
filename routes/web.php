<?php

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

// Redirect to login if not logged in, or homepage if logged in
Route::get('/', function () {
    return view('welcome');
});

// Main page with everyone's posts
Route::get('/home', function () {
    return "This is the blog's home page.";
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

// Create new post
Route::get('/newpost', function () {
    return view('newpost');
});

// View a user's profile, posts & comments
Route::get('/profile/{username}', function($name) {
    return "This is $username's blog page.";
});

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