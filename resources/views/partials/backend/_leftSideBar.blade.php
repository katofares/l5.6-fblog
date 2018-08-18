<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">My blog</a>
            <a class="navbar-brand hidden" href="./">Fk</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Posts</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder text-success"></i>Posts</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list-ul"></i><a href="{{ route('backend.blogs.index') }}">All posts</a></li>
                        <li><i class="fa fa-plus-circle"></i><a href="{{ route('backend.blogs.create') }}">Create post</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{route('backend.blogs.trash')}}">Trashed posts</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Categories</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder text-success"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list-ul"></i><a href="{{ route('backend.categories.index') }}">All categories</a></li>
                        <li><i class="fa fa-plus-circle"></i><a href="{{ route('backend.categories.create') }}">Create category</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>