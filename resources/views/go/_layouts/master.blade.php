<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Go CMS</title>
    <meta name="keywords" content="Go CMS"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="PS systems">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href='{{ URL::asset('fonts/opensans/opensans.css?family=Open+Sans:400,300,600,700,800&subset=latin,cyrillic-ext,cyrillic') }}'
          rel='stylesheet'/>

    {{--Tp style assets--}}
    @if(config('go.tdebug'))
        <link rel="stylesheet" href="http://localhost:3030/css/tp.css" type="text/css"/>
    @else
        <link rel="stylesheet" href="{{ URL::asset('css/tp.css') }}" type="text/css"/>
    @endif

    {{--Go style assets--}}
    @if(config('go.xdebug'))
        <link rel="stylesheet" href="http://localhost:3000/css/vendor.css">
        <link rel="stylesheet" href="http://localhost:3000/css/go.css">
    @else
        <link rel="stylesheet" href="{{ URL::asset('css/vendor.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/go.css') }}"/>
        @endif
    @yield('style')

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<body class="notransition">
<?php
if(Auth::user()->role_id != 6){
?>
@include('go._partials.header')
@include('go._partials.sidebar')
<?php
}
?>
<div id="wrapper" @if(Auth::user()->role_id ==6) style="margin: 0;" @endif>
    @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="{{ URL::asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{ URL::asset('vendor/chosen.jquery.js')}}"></script>
<script type="text/javascript" charset="utf-8"
        src="{{ URL::asset('vendor/handsontable.full_2016_04_01_mn.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{ URL::asset('vendor/handsontable-chosen-editor.js')}}"></script>

{{--Go script assets--}}
@if(config('go.xdebug'))
    <script src="http://localhost:3000/js/vendor.js"></script>
@else
    <script src="{{  URL::asset('js/vendor.js') }}"></script>
@endif
@yield('script')
</body>
</html>