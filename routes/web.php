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


// Public Controller Routes goes from here
Route::get('/', 'PublicController@index')->name('index');

// Single Post view route
Route::get('post/{post}', 'PublicController@singlePost')->name('singlePost');

// contact view route
Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('contact', 'PublicController@contactPost')->name('contactPost');

// about view route
Route::get('about', 'PublicController@about')->name('about');

// authenticated routes
Auth::routes();

// dashboard routes for HomeController
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// user route group
Route::prefix('user')->group(function(){
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
    Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
});

// author route group
Route::prefix('author')->group(function(){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
});

// admin route group
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('/posts', 'AdminController@posts')->name('adminPosts');
    Route::get('/comments', 'AdminController@comments')->name('adminComments');
    Route::get('/users', 'AdminController@users')->name('adminUsers');
});
