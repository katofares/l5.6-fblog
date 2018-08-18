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

/*
*********************************
 * Back End Routes
*********************************
*/
Route::resource('backend/blog','Backend\PostsController')->except(['show'])->names('backend.blogs');
Route::get('backend/blog/trash', 'Backend\PostsController@trash')->name('backend.blogs.trash');
Route::delete('backend/blog/{blog}/delete', 'Backend\PostsController@delete')->name('backend.blogs.delete');
Route::put('backend/blog/restore/{blog}', 'Backend\PostsController@restore')->name('backend.blogs.restore');

Route::resource('backend/categories','Backend\CategoriesController')->names('backend.categories');

