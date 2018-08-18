@extends('layouts.backend')

@section('title', "Post | Edit")


@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.blogs.edit', $blog) }}
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <div class="col-lg-9">
                    <strong>Update Post : {{ $blog->title }}</strong>
                </div>
                <div class="buttons pull-right">
                    <a href="{{ route('backend.blogs.index') }}" class="button btn btn-secondary ">All Posts</a>
                    <a href="{{ route('backend.blogs.create') }}" class="button btn btn-primary ">New Post</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.blogs.update', $blog->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.posts.form')
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>

                </form>
            </div>
        </div>
    </div>


@endsection