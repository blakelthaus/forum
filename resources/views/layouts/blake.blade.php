<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Borgholthaus') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/build/tailwind.css">

    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

    <!-- Scripts -->
    <script src="https://blakeborgholthaus.com/js/app.js" defer></script>



    <style>
        body {

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
<body>
    <div id="app">
        <main>
            <div class="flex flex-row">
                <div id="sidebar" class="bg-green-600 px-4 py-12 lg:px-12 h-screen w-1/5">
                    <h1 class="py-4 text-white lg:text-4xl sm:text-2xl">Blake Borgholthaus</h1>
                    <img class="mx-auto rounded-full content-center" src="/img/blake.jpg" alt="Blakes Picture">
                    <ul class="py-6">
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">Skillz</a></li>
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">About Me</a></li>
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">Contact</a></li>
                    </ul>
                </div>
                <div id="content" class="flex-auto">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>