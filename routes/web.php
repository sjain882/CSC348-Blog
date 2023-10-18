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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {
    return "This is the blog page.";
});

Route::redirect('/blog2', '/blog');

Route::get('/blog/{name}', function($name) {
    return "This is $name's blog page.";
});

Route::get('/user/{name?}', function($name = '|John') {
    return "User = $name";
});