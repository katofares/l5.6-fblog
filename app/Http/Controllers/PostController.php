<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $limit = 3;

    public function index()
    {
        $posts = Post::with('user')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
        return view('blogs.index', compact('posts'));
    }
}
