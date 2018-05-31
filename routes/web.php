<?php

Route::get('/', function () {
    return view('blogs.index');
});


Route::get('/blogs/show', function (){
    return view('blogs.show');
});