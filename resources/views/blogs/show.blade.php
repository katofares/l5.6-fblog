@extends('layouts.main')

@section('content')
    <div class="col-md-8">
        <article class="post-item post-detail">
            @if($post->image_url)
                <div class="post-item-image">
                    <img src="{{ $post->image_url }}" alt="">
                </div>
            @endif

            {{-- $author variable --}}
             @php($author = $post->user)

            <div class="post-item-body">
                <div class="padding-10">
                    <h1>{{ $post->title }}</h1>

                    <div class="post-meta no-border">
                        <ul class="post-meta-group">
                            <li><i class="fa fa-user"></i>{{ $author->name }}</li>
                            <li><i class="fa fa-clock-o"></i><time>{{ $post->date }}</time></li>
                            <li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->name }}</a></li>
                            <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                        </ul>
                    </div>
                    {!! $post->body !!}
                </div>
            </div>
        </article>

        <article class="post-author padding-10">
            <div class="media">
                <div class="media-left">
                    <img alt="{{ $author->name }}" src="{{ $author->gravatar }}" class="media-object">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $author->name }}</h4>
                    <div class="post-author-count">
                        <i class="fa fa-clone"></i>
                        @php($countPosts = $author->posts->count())
                         {{ $countPosts }}{{ str_plural('post', $countPosts) }}
                    </div>
                    <p>{!! $author->bio !!}</p>
                </div>
            </div>
        </article>
{{--
        <article class="post-comments">
            <h3><i class="fa fa-comments"></i> 5 Comments</h3>

            <div class="comment-body padding-10">
                <ul class="comments-list">
                    <li class="comment-item">
                        <div class="comment-heading clearfix">
                            <div class="comment-author-meta">
                                <h4>John Doe <small>January 14, 2016</small></h4>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                            <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>
                        </div>
                    </li>

                    <li class="comment-item">
                        <div class="comment-heading clearfix">
                            <div class="comment-author-meta">
                                <h4>John Doe <small>January 14, 2016</small></h4>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                            <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>

                            <ul class="comments-list-children">
                                <li class="comment-item">
                                    <div class="comment-heading clearfix">
                                        <div class="comment-author-meta">
                                            <h4>John Doe <small>January 14, 2016</small></h4>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                                        <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>
                                    </div>
                                </li>

                                <li class="comment-item">
                                    <div class="comment-heading clearfix">
                                        <div class="comment-author-meta">
                                            <h4>John Doe <small>January 14, 2016</small></h4>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                                        <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>

                                        <ul class="comments-list-children">
                                            <li class="comment-item">
                                                <div class="comment-heading clearfix">
                                                    <div class="comment-author-meta">
                                                        <h4>John Doe <small>January 14, 2016</small></h4>
                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                                                    <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="comment-footer padding-10">
                <h3>Leave a comment</h3>
                <form>
                    <div class="form-group required">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group required">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" class="form-control">
                    </div>
                    <div class="form-group required">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="clearfix">
                        <div class="pull-left">
                            <button type="submit" class="btn btn-lg btn-success">Submit</button>
                        </div>
                        <div class="pull-right">
                            <p class="text-muted">
                                <span class="required">*</span>
                                <em>Indicates required fields</em>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

        </article>
        --}}
    </div>
@endsection