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
    Route::post('new-comment/', 'UserController@newComment')->name('newComment');
    Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
});

// author route group
Route::prefix('author')->group(function(){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('posts/new', 'AuthorController@newPost')->name('newPost');
    Route::post('posts/new', 'AuthorController@createPost')->name('createPost');
    Route::get('posts/{id}/edit', 'AuthorController@editPost')->name('editPost');
    Route::post('posts/{id}/edit', 'AuthorController@editPostSave')->name('editPostSave');
    Route::post('posts/{id}/delete', 'AuthorController@deletePost')->name('deletePost');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
});

// admin route group
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('/posts', 'AdminController@posts')->name('adminPosts');
    Route::get('/comments', 'AdminController@comments')->name('adminComments');
    Route::get('posts/{id}/edit', 'AdminController@editPost')->name('adminEditPost');
    Route::post('posts/{id}/edit', 'AdminController@editPostSave')->name('adminEditPostSave');
    Route::post('posts/{id}/delete', 'AdminController@deletePost')->name('adminDeletePost');
    Route::post('comment/{id}/delete', 'AdminController@deleteComment')->name('adminDeleteComment');
    Route::get('/users', 'AdminController@users')->name('adminUsers');
    Route::post('users/{id}/delete', 'AdminController@deleteUser')->name('adminDeleteUser');

    // user's permission editing toutes
    Route::get('users/{id}/makeAdmin', 'AdminController@makeAdmin')->name('makeAdmin');
    Route::get('users/{id}/removeAdmin', 'AdminController@removeAdmin')->name('removeAdmin');

    Route::get('users/{id}/makeAuthor', 'AdminController@makeAuthor')->name('makeAuthor');
    Route::get('users/{id}/removeAuthor', 'AdminController@removeAuthor')->name('removeAuthor');
});
