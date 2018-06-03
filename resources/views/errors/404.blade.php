{{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
@extends('layouts.main')

@section('content')
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            <div class="col-md-8">
                <div class="error-template col-md-8 col-md-offset-2">
                    <h1 class="text-danger">
                        Oops!</h1>
                    <h2>
                        404 Page Not Found</h2>
                    <div class="error-details">
                        Sorry, an error has occured, Requested page not found!
                        <h2>Navigate from the side bar or </h2>
                    </div>
                    <div class="error-actions">
                        <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Take Me Home</a>
                    </div>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
@endsection