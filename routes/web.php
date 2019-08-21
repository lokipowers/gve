<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
<<<<<<< HEAD
Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');


// UserController Routes
Route::get('/profile', 'UserController@viewOwnProfile')->name('userProfile');
Route::get('/profile/{username}', 'UserController@viewProfile');
=======

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 83a6d5e77d80b4399a83c30329420fa2b104e5be
