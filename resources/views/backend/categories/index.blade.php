@extends('layouts.backend')

@section('title', 'Categories')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.categories.index') }}
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ $title }}</strong>
                        <a href="{{ route('backend.categories.create') }}" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            Create New Category
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ str_limit($category->name, 30) }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td width="150">
                                                <form action="{{ route('backend.categories.edit', $category) }}" style="float: left; margin-right: 10px">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                                </form>
                                                <form action="{{ route('backend.categories.destroy', $category->id) }}" method="POST" style="float: left; margin-right: 10px">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"  title="Delete"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if($categories_count <= 0)
                                        <div class="alert alert-info" >
                                            There is no posts !!
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="bootstrap-data-table_paginate">
                                        {{ $categories->links() }}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 text-right">
                                    <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                         aria-live="polite">{{ $categories_count }} {{ str_plural('Item') }}
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