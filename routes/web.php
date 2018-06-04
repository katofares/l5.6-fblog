<?php

/*
*********************************
 * Front End Routes
*********************************
*/
Route::get('/', 'PostController@index')->name('blogs.index');
Route::get('/blogs/{post}', "PostController@show")->name('blogs.show');
Route::get('/category/{category}', "PostController@category")->name('category');
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::resource('backend/blog','Backend\PostsController')->names('backend.blogs');