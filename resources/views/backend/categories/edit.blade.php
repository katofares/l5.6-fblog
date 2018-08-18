@extends('layouts.backend')

@section('title', "Category | Edit")


@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.categories.edit', $category) }}
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <div class="col-lg-9">
                    <strong>Update Category : {{ $category->name }}</strong>
                </div>
                <div class="buttons pull-right">
                    <a href="{{ route('backend.categories.index') }}" class="button btn btn-secondary ">All Categories</a>
                    <a href="{{ route('backend.categories.create') }}" class="button btn btn-primary ">New Category</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.categories.update', $category->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    @include('backend.categories.form')
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>

                </form>
            </div>
        </div>
    </div>


@endsection