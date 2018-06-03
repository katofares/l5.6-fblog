<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var int
     * Pagination limit
     */
    protected $limit = 3;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * List of posts
     */
    public function index()
    {
        $posts = Post::with('user')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
        return view('blogs.index', compact('posts'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()
            ->with('user')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);
        return view('blogs.index', compact('posts'));
    }




    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show Post
     */
    public function show(Post $post)
    {
        // Increment view_count column when user visit post
        $post->increment('view_count');

        return view('blogs.show', compact('post'));
    }
}
