<?php

/*
*********************************
 * Front End Routes
*********************************
*/
Route::get('/', 'PostController@index')->name('blogs.index');
Route::get('/blogs/{post}', "PostController@show")->name('blogs.show');
Route::get('/category/{category}', "PostController@category")->name('category');