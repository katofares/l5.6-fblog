<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\PostsFormRequest;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends BackendController
{
    // Imaged upload path
    protected $uploadPath;


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
        $title = 'Posts';
        $isTrash = false;
        $postsCount = Post::count();
        $posts = Post::latest()->with('category', 'user')->paginate(self::LIMIT);
        return view('backend.posts.index', compact('posts', 'postsCount', 'title', 'isTrash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Post $blog
     * @return \Illuminate\Http\Response
     */
    public function create(Post $blog)
    {
        $title = 'Create new posts';
        $categories = Category::latest()->get();
        return view('backend.posts.create', compact('blog', 'categories', 'title'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostsFormRequest $request
     * @param Post $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostsFormRequest $request, Post $blog)
    {
        $data = $this->handleRequest($request);
        return $request->user()->posts()->create($data) ? redirect()->route('backend.blogs.index')->with('success', 'Post has been successfully created') : back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $blog)
    {
        $categories = Category::latest()->get();
        return view('backend.posts.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostsFormRequest $request
     * @param  Post $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostsFormRequest $request, Post $blog)
    {
        $data = $this->handleRequest($request);
        // handle the slug
        $data['slug'] = isset($request['slug'] ) ? str_slug($request['slug']) : str_slug($request['title']);
        if($request['slug'] == null || $request['slug'] == ''){
            $data['slug'] = str_slug($request['title']);
        }

        $blog->update($data);

        return redirect()->route('backend.blogs.index')->with('trash', 'Post has been successfully updated');

    }

    /**
     * Handle the request for edit and store
     * @param $request
     * @return mixed
     */
    private function handleRequest($request){
        $data = $request->all();
        // handle the slug
        $data['slug'] = $request['slug'] != null ? str_slug($request['slug']) : str_slug($request['title']);

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
     * Remove post to trash via soft delete
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('backend.blogs.index')->with('trash', 'Post moved to trash');
    }
    /**
     * Display trashed post
     */
    public function trash()
    {
        $title = 'Trashed posts';
        $isTrash = true;
        $postsCount = Post::onlyTrashed()->count();
        $posts = Post::onlyTrashed()->with('category', 'user')->paginate(self::LIMIT);
        return view('backend.posts.index', compact('posts', 'postsCount', 'isTrash', 'title'));
    }

    /**
     * Restore trashed posts
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $blog = Post::withTrashed()->findOrFail($id);
        $blog->restore();
        return back()->with('success', 'Post has been successfully restored');
    }

    /**
     * Delete trashed posts permanently
     */
    public function delete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        // Remove the image and thumbnail
        $this->removeImage($post->image);
        return back()->with('success', 'Post has been successfully deleted permanently');

    }

    /**
     * Remove post image and thumbnail when delete post permanently
     */
    public function removeImage($image)
    {
        if(!empty($image)){
            $imagePath = $this->uploadPath . '/'. $image;
            // $thumbnail handling
            $ext = substr(strrchr($image, '.'), 1);
            $thumbnail = str_replace_last(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            if(file_exists($thumbnailPath)){
                unlink($thumbnailPath);
            }
        }
    }

}



