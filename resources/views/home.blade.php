@extends('layouts.backend')

@section('content')
    @php($currentUser = auth()->user())
<div class="row">
    @php($userPostsCount = $currentUser->posts->count())
    @if($userPostsCount > 0)
        <div class="col-sm-12 mb-4">
            <div class="card-group">
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-users"></i>
                        </div>

                        <div class="h4 mb-0">
                            <span class="count">87500</span>
                        </div>

                        <small class="text-muted text-uppercase font-weight-bold">Visitors</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="count">385</span>
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">New Clients</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-cart-plus"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="count">1238</span>
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Products sold</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="count">28</span>%
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Returning Visitors</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="h4 mb-0">5:34:11</div>
                        <small class="text-muted text-uppercase font-weight-bold">Avg. Time</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-comments-o"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="count">972</span>
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">COMMENTS</small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
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
