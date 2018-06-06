<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\PostsFormRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends BackendController
{
    // Pagination limit
    const LIMIT = 10;

    /**
     * Display a listing of the resource.+-
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsCount = Post::count();
        $posts = Post::latest()->with('category', 'user')->paginate(self::LIMIT);
        return view('backend.posts.index', compact('posts', 'postsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $categories = Category::latest()->get();
        return view('backend.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostsFormRequest $request, Post $post)
    {
        return $request->user()->posts()->create($request->all()) ? redirect()->route('backend.blogs.index')->with('success', 'Post has been successfully created') : back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
