@extends('layouts.backend')

@section('title', 'Posts')

@if($isTrash)
    @section('breadcrumbs')
        {{ Breadcrumbs::render('backend.blogs.trash') }}
    @endsection
@else
    @section('breadcrumbs')
        {{ Breadcrumbs::render('backend.blogs.index') }}
    @endsection
@endif

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ $title }}</strong>
                        <a href="{{ route('backend.blogs.create') }}" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            Create New Post
                        </a>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-7 offset-sm-5">
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
                                                @if(!$isTrash)
                                            <th scope="col">Status</th>
                                            @endif
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
                                            @if(!$isTrash)
                                                <td>{!! $post->showStatus() !!}  </td>
                                            @endif
                                            <td width="100">
                                            @if(!$isTrash)
                                                <form action="{{ route('backend.blogs.edit', $post->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                                </form>
                                                <form action="{{ route('backend.blogs.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"  title="Trash"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                                @else
                                                    <form action="{{route('backend.blogs.restore', $post->id)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success" title="Restore"><i class="fa fa-refresh"></i></button>
                                                    </form>
                                                    <form action="{{ route('backend.blogs.delete', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete Permanent"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if($isTrash)
                                    @if($postsCount <= 0)
                                        <div class="alert alert-info" >
                                            There is no posts !!
                                        </div>
                                    @endif
                                    @endif
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