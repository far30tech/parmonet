<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/dist/css/custom-style.css">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.admin.nav')
    @include('layouts.admin.aside')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            @yield('title')
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            @yield('breadcrumb')
                            {{--<li class="breadcrumb-item"><a href="#">خانه</a></li>--}}
                            {{--<li class="breadcrumb-item active">داشبورد ورژن 2</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<script src="{{ asset('/js/app.js')}}"></script>
@yield('script')
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('dist/js/demo.js')}}"></script>
</body>
</html>
