@extends('layouts.backend')

@section('title', 'Categories | New')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.categories.create') }}
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>{{ $title }}</strong>
                <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary pull-right">All Categories</a>
            </div>
        <div class="card-body">
        <form action="{{ route('backend.categories.store') }}" method="POST" class="form-horizontal">
            @csrf
            @include('backend.categories.form')
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-dot-circle-o"></i> Create
                    </button>
        </form>
        </div>

    </div>
    </div>


@endsection