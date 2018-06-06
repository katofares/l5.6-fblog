<div class="breadcrumbs">
    <div class="page-header">
        <div class="page-title">
            @if (count($breadcrumbs))
                <ol class="breadcrumb">
                    @foreach ($breadcrumbs as $breadcrumb)

                        @if ($breadcrumb->url && !$loop->last)
                            <li class=""><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                            <li class=" active">{{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
</div>

