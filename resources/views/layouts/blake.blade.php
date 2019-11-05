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

    <script src="https://kit.fontawesome.com/2eda377822.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/build/tailwind.css">

    <!-- Scripts -->
    <script src="{{ env('APP_URL', 'https://blakeborgholthaus.com') }}/js/app.js" defer></script>
    <script src="{{ env('APP_URL', 'https://blakeborgholthaus.com') }}/js/tire.js" defer></script>

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
        #selfy {

        }
        #tire {

        }
    </style>
</head>
<body>
    <div id="app">
        <main>
            <div class="flex flex-row">
                <div id="sidebar" class="fixed bg-green-600 px-4 py-12 lg:px-12 h-full min-h-screen w-1/5">
                    <h1 class="py-4 text-white lg:text-4xl sm:text-2xl"><a class="hover:text-black" href="/">Blake Borgholthaus</a></h1>
                    <img id="tire" class="absolute left-0" src="/img/tire-2.png" alt="spinny-wheel">
                    <img id="selfy" class="relative p-8 mt-3 object-bottom rounded-full" src="/img/blake.jpg" alt="Blakes Picture">

                    <ul class="py-6">
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="/resume">Resume</a></li>
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">About Me</a></li>
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="/contact">Contact</a></li>
                        <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="/vgk">VGK Stats</a></li>
                    </ul>
                    <div id="social" class="flex flex-row">
                        <a class="py-2 flex text-white lg:text-3xl sm:text-2xl hover:text-black hover:no-underline" href="https://www.facebook.com/blake.borgholthaus"><i class="fab fa-facebook-square hover:text-black"></i></a>
                        <a class="py-2 flex text-white lg:text-3xl sm:text-2xl hover:text-black hover:no-underline" href="https://www.instagram.com/blakelthaus/"><i class="fab fa-instagram hover:text-black"></i></i></a>
                        <a class="py-2 flex text-white lg:text-3xl sm:text-2xl hover:text-black hover:no-underline" href="https://www.linkedin.com/in/blake-borgholthaus"><i class="fab fa-linkedin hover:text-black"></i></i></a>
                    </div>
                </div>
                <div id="content" class="flex flex-auto">
                    <div class="h-full min-h-screen w-1/4"></div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
