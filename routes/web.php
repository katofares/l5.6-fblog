<?php

Route::get('/', 'PostController@index')->name('blogs.index');


Route::get('/blogs/show', function (){
    return view('blogs.show');
});