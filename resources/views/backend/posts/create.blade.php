@extends('layouts.backend')

@section('title', 'Posts')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.blogs.create') }}
@endsection


@section('content')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Create New Post</strong>
                <a href="{{ route('backend.blogs.index') }}" class="btn btn-secondary pull-right">Back</a>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('backend.blogs.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="title" class=" form-control-label">Title</label></div>
                        <div class="col-12 col-md-10">
                            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                            @if ($errors->has('title'))<span class="invalid-feedback">{{ $errors->first('title') }}</span> @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="slug" class=" form-control-label">Slug</label></div>
                        <div class="col-12 col-md-10">
                            <input type="text" id="slug" name="slug" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" >
                            @if ($errors->has('slug'))<span class="invalid-feedback">{{ $errors->first('slug') }}</span> @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="excerpt" class=" form-control-label">Excerpt</label></div>
                        <div class="col-12 col-md-10">
                            <textarea id="excerpt" name="excerpt" class="form-control" cols="10" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="body" class=" form-control-label">Body</label></div>
                        <div class="col-12 col-md-10">
                            <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" cols="10" rows="10"></textarea>
                            @if ($errors->has('body'))<span class="invalid-feedback">{{ $errors->first('body') }}</span> @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="published_at" class=" form-control-label">Publication Date</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input class="form-control {{ $errors->has('published_at') ? ' is-invalid' : '' }}" name="published_at" >
                            @if ($errors->has('published_at'))<span class="invalid-feedback">{{ $errors->first('published_at') }}</span> @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category">Select Category:</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Featured image:</label>
                        <div class="input-group">
                            <input type="file" name="image" class="from-control">
                            @if ($errors->has('image'))<span class="invalid-feedback">{{ $errors->first('image') }}</span> @endif
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>

                </form>
            </div>

        </div>
    </div>


@endsection