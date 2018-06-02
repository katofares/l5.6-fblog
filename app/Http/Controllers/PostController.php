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
        /**
         * Filter categories posts
         */
        $categories = Category::with(['posts'=> function($query){
            $query->published();
        }])->get();
        $posts = Post::with('user')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
        return view('blogs.index', compact('posts','categories'));
    }

    public function category(Category $category)
    {
        /**
         * Filter categories posts
         */
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->get();
        $posts = $category->posts()->with('user')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);
        return view('blogs.index', compact('posts','categories'));
    }




    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show Post
     */
    public function show(Post $post)
    {
        return view('blogs.show', compact('post'));
    }
}
