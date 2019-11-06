<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/build/tailwind.css">

    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

    {{--Google Charts API--}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Scripts -->
    <script src="{{ env('APP_URL', 'https://blakeborgholthaus.com') }}/js/app.js" defer></script>
    <script src="{{ env('APP_URL', 'https://blakeborgholthaus.com') }}/js/charts.js" defer></script>

    <style>
        body {
            padding-bottom: 100px;
        }
        .level {
            display: flex;
            align-items:center;
        }
        .flex {
            flex: 1;
        }
    </style>
</head>
<body style="">
@include('vgk.nav')
<br>
<br>
<br>
<div id="app">
    <main class="">
        <div class="p-5">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
