<?php
/**
 * Created by PhpStorm.
 * User: fares
 * Date: 05.06.18
 * Time: 5:57
 */

// Dashboard
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// dashboard
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Dashboard', route('home'));
});

/*****************************
|   Admin Posts breadcrumbs
 *****************************/
// dashboard > Posts
Breadcrumbs::for('backend.blogs.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Posts', route('backend.blogs.index'));
});

// Dashboard > Trashed Posts
Breadcrumbs::for('backend.blogs.trash', function ($trail) {
    $trail->parent('backend.blogs.index');
    $trail->push('Trashed Posts', route('backend.blogs.trash'));
});


// Dashboard > Blog > new post
Breadcrumbs::for('backend.blogs.create', function ($trail) {
    $trail->parent('backend.blogs.index');
    $trail->push('New post', route('backend.blogs.create'));
});

// Dashboard > Blog > edit
Breadcrumbs::for('backend.blogs.edit', function ($trail, $blog) {
    $trail->parent('backend.blogs.index', $blog);
    $trail->push($blog->title, route('backend.blogs.edit', $blog));
});


/*****************************
|   Admin Categories breadcrumbs
 *****************************/

// Dashboard > categories
Breadcrumbs::for('backend.categories.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Categories', route('backend.categories.index'));
});

// Dashboard > categories > new post
Breadcrumbs::for('backend.categories.create', function ($trail) {
    $trail->parent('backend.categories.index');
    $trail->push('New Category', route('backend.categories.create'));
});

// Dashboard > categories > edit
Breadcrumbs::for('backend.categories.edit', function ($trail, $category) {
    $trail->parent('backend.categories.index', $category);
    $trail->push($category->name, route('backend.categories.edit', $category));
});



// Home > Blog > [Category]
//Breadcrumbs::for('category', function ($trail, $category) {
//    $trail->parent('blog');
//    $trail->push($category->title, route('category', $category->id));
//});

// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('category', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});