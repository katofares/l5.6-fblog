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

// dashboard > Posts
Breadcrumbs::for('backend.blogs.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Posts', route('backend.blogs.index'));
});

// Home > Blog
Breadcrumbs::for('backend.blogs.create', function ($trail) {
    $trail->parent('backend.blogs.index');
    $trail->push('New post', route('backend.blogs.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('category', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});