@extends('layouts.main')

@section('content')
    <div class="col-md-8">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <article class="post-item">
                    @if($post->image_url)
                        <div class="post-item-image">
                            <a href="{{ route('blogs.show', $post->slug) }}">
                                <img src="{{ $post->image_url }}" alt="">
                            </a>
                        </div>
                    @endif
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="{{ route('blogs.show', $post->slug) }}">{{ $post->title }}</a></h2>
                            <p>{!! $post->excerpt !!}</p>
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i>{{ $post->user->name }}</li>
                                    <li><i class="fa fa-clock-o"></i><time>{{$post->date}}</time></li>
                                    <li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('blogs.show', $post->slug) }}">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
         @else
            <div class="alert alert-warning">
                <h2>There are no Posts !!!!</h2>
            </div>
         @endif
        {{ $posts->links() }}
        {{--<nav>--}}
            {{--<ul class="pager">--}}
                {{--<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>--}}
                {{--<li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
    </div>
@endsection