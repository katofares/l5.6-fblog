<?php

namespace App\Http\Controllers\Backend;


use App\Category;
use App\Http\Requests\CategoryDeleteRequest;
use App\Post;
use Illuminate\Http\Request;

class CategoriesController extends BackendController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Categories';
        $categories_count = Category::count();
        $categories = Category::orderBy('name')->paginate(self::LIMIT);
        return view('backend.categories.index', compact('categories', 'categories_count', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $title = 'Create new category';
        return view('backend.categories.create', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clean_data = $request->validate([
            'name' => 'required|unique:categories|max:200|min:2'
        ]);
        $slug = str_slug($request->name, '-');
        $clean_data['slug'] = $slug;

        if(Category::create($clean_data)){
            return redirect()->route('backend.categories.index')->with('success', 'Category created successfully');
        }else{
            return back()->withErrors();
        }
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
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
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
        // Validation
        $clean_data = $request->validate([
            'name' => 'required|unique:categories|min:2'
        ]);
        // Generate slug from name
        $clean_data['slug'] = str_slug($request->name, '-');
        // Get category to update
        $category = Category::findOrFail($id);
        // Update category and redirection
        if($category->update($clean_data)){
            return redirect()->route('backend.categories.index')->with('success', 'Category updated successfully');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryDeleteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDeleteRequest $request ,$id)
    {
        // Make category's posts belong to uncategorized category
        Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('myConfig.uncategorized_category_id')]);
        // Find category
        $category = Category::findOrFail($id);
        // Delete and redirect
        if($category->delete()){
            return redirect()->route('backend.categories.index')->with('success', 'category deleted !');
        } else {
            return back();
        }
    }
}
