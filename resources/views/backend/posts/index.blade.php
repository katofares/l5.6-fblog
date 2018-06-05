@extends('layouts.backend')

@section('title', 'Posts')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.blogs.index') }}
@endsection


@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">All posts</strong>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('backend.blogs.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i>
                                        Create New Post
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="bootstrap-data-table_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="bootstrap-data-table"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{ str_limit($post->title, 30) }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                <abbr title="{{ $post->formattedDate(true) }}">{{ $post->formattedDate() }}</abbr>
                                            </td>
                                            <td>{!! $post->showStatus() !!}  </td>
                                            <td>
                                                <a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="bootstrap-data-table_paginate">
                                        {{ $posts->links() }}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 text-right">
                                    <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                         aria-live="polite">{{ $postsCount }} {{ str_plural('Item') }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection