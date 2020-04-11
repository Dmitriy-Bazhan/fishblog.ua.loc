<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fishblog</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <style>
        body
        {
            font-family: 'Nunito', sans-serif;
            font-size: 14pt;
            background-color: #6c757d;
        }
    </style>

</head>
<body>
@section('header')
    @include('components.header')
@show


<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-3.4.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>

@yield('content')

</body>
