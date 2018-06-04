@extends('layouts.backend')

@section('content')
    @php($currentUser = auth()->user())
<div class="row">
    @php($userPostsCount = $currentUser->posts->count())
    @if($userPostsCount > 0)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-server text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Posts</div>
                                <div class="stat-text">Total: 765</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-user text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Users</div>
                                <div class="stat-text">Total: 24720</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-stats-up text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Daily Sales</div>
                                <div class="stat-text">Total: $76,58,714</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-pulse text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Bandwidth</div>
                                <div class="stat-text">Total: 4TB</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Welcome {{ $currentUser->name }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted m-b-15">It seems U didn't create any posts may be this is your first time here
                    so please <br>start by clicking the button <i class="ti-hand-point-down text-primary"></i></p>
                    <p><a href="" class="btn btn-lg btn-primary">Create Your first post</a></p>
                </div>
            </div>
        </div>
     @endif
</div>
@endsection
