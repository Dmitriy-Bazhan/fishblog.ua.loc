<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fishblog</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/open-iconic-master/font/css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 14pt;
            background-image: url({{ asset('images/Lake02.jpg') }});
            background-attachment: fixed;
            background-size: cover;
        }
        h2{
            color: lightsteelblue;
        }
    </style>

</head>

<body>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-3.4.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>

@section('header')
    @include('components.header')
@show
<br>

<div class="container-fluid" >
    <div class="row" style="width: 100%">
{{--    @section('aside')--}}
{{--        @include('components.aside')--}}
{{--    @show--}}

    @yield('content')
    </div>
</div>
@section('footer')
    @include('components.footer')
@show

</body>
</html>
