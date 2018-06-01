<?php

/*
*********************************
 * Front End Routes
*********************************
*/
Route::get('/', 'PostController@index')->name('blogs.index');
Route::get('/blogs/show/{post}', "PostController@show")->name('blogs.show');