<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\PostsFormRequest;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends BackendController
{
    // Imaged upload path
    protected $uploadPath;

    // Pagination limit
    const LIMIT = 10;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('myConfig.image.directory'));
    }


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
        $data = $this->handleRequest($request);
        return $request->user()->posts()->create($data) ? redirect()->route('backend.blogs.index')->with('success', 'Post has been successfully created') : back();
    }

    private function handleRequest($request){
        $data = $request->all();
        if($request->hasFile('image')){
            // get the image
            $image = $request->file('image');
            $dest = $this->uploadPath;
            $fileName = rand() . $image->getClientOriginalName();
            $uploadedImage = $image->move($dest, $fileName);

            // create thumbnail
            if($uploadedImage){
                $width = config('myConfig.image.thumbnail.width');
                $height = config('myConfig.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                // Move the image to the server

                Image::make($dest . '/'. $fileName)->resize($width, $height)->save($dest .'/'.$thumbnail);
            }
            // Save the image in the database
            $data['image'] = $fileName;
        }
        return $data;

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
