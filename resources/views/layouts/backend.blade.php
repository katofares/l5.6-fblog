<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('backend/css/flag-icon.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('backend/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body>
<!-- Left Panel -->
@include('partials.backend._leftSideBar')
<!-- Left Panel -->

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
@include('partials.backend._header')
    <!-- Breadcrumbs-->
 <div class="breadcrumbs">
    @yield('breadcrumbs')
 </div>

 @include('partials.backend._messages')
    <div class="content mt-3">
    @yield('content')

    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{ asset('backend/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('backend/js/plugins.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>


{{--<script src="{{ asset('backend/js/lib/chart-js/Chart.bundle.js') }}"></script>--}}
<script src="{{ asset('backend/js/dashboard.js') }}"></script>
{{--<script src="{{ asset('backend/js/widgets.js') }}"></script>--}}


</body>
</html>
