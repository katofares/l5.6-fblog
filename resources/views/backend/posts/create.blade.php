@extends('layouts.backend')

@section('title', 'Posts | New')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.blogs.create') }}
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>{{ $title }}</strong>
                <a href="{{ route('backend.blogs.index') }}" class="btn btn-secondary pull-right">All Posts</a>
            </div>
        <div class="card-body">
        <form action="{{ route('backend.blogs.store') }}" method="POST" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf
            @include('backend.posts.form')
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-dot-circle-o"></i> Create
                    </button>
        </form>
        </div>

    </div>
    </div>


@endsection