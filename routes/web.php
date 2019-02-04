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
Route::get('post/{id}', 'PublicController@singlePost')->name('singlePost');

// contact view route
Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('contact', 'PublicController@contactPost')->name('contactPost');

// about view route
Route::get('about', 'PublicController@about')->name('about');

// authenticated routes
Auth::routes();

// dashboard routes for HomeController
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// admin route group
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('adminDashboard');
});
