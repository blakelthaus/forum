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
    <script src="{{ env('APP_URL') }}/js/app.js" defer></script>
    <script src="{{ env('APP_URL') }}/js/tire.js" defer></script>
</head>
<body>
    <div id="main-content" class="bg-gray-100 dark:bg-gray-700">
        <div class="flex items-center justify-between flex-wrap bg-gray-200 p-6 shadow-lg dark:bg-gray-900">
            <div class="container">
                <nav class="flex items-center justify-between flex-wrap">
                    <div class="flex items-center flex-no-shrink text-white mr-6">
                    <img class="h-12 w-12 mr-2 rounded-full" width="108" height="108" src="/img/blake.jpg" />
                    <span class="font-semibold text-black text-xl tracking-tight dark:text-white">Blake Borgholthaus</span>
                    </div>
                    <div class="block lg:hidden">
                    <button class="flex items-center px-3 py-2 border rounded text-black border-black hover:text-white hover:border-white dark:bg-white dark:text-gray-700 dark:border-white" id="hamburger">
                        <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                    </div>
                    <div class="w-full hidden flex-grow lg:pb-5 lg:flex lg:items-center lg:w-auto" id="mobile-nav">
                    <div class="text-sm lg:flex-grow">
                        <a href="" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-600 mr-4 lg:ml-4 dark:text-white">
                        Sites
                        </a>
                        <a href="" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-600 mr-4 dark:text-white">
                        Skills
                        </a>
                        <a href="" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-600 dark:text-white">
                        Social
                        </a>
                    </div>
                    <div>
                        <a href="#" id="color-mode" class=" inline-block text-sm px-4 py-2 shadow-md leading-none border rounded text-black border-gray-900 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 hover:border-transparent hover:text-white hover:bg-black mt-4 lg:mt-0 dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black">Dark Mode</a>
                    </div>
                    </div>
                </nav>
            </div>
        </div>
        {{-- body content to be split from header once done prototyping --}}
        <div class="container my-12 mx-auto px-4 md:px-12" id="sites">
            <h2 class="text-4xl dark:text-white">Websites</h2>
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach($sites as $key => $site)
                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                        <!-- Article -->
                        <article class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 overflow-hidden rounded-lg shadow-lg dark:bg-gray-900 ">
                            <a href="{{ $site['link'] }}">
                                <img alt="{{ $site['title'] }}" class="block h-auto w-full" src="{{ $site['img'] }}">
                            </a>
                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black dark:text-white dark:hover:text-gray-300" href="https://vegasgoesgold.com">
                                        {{ $site['title'] }}
                                    </a>
                                </h1>
                            </header>
                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline text-black ml-2 text-sm hover:text-black hover:no-underline dark:text-white dark:hover:text-gray-300" href="#">    
                                    {{ $site['description'] }}
                                </a>
                            </footer>
                        </article>
                        <!-- END Article -->
                    </div>
            @endforeach
            </div>
        </div>
        <div class="container my-12 mx-auto px-4 md:px-12" id="skills">
            <h2 class="text-4xl dark:text-white">Skills</h2>
            <div class="flex flex-wrap -mx-1 lg:-mx-4 p-4">
                @foreach($skills as $key => $skill)
                    <div class="shadow-sm dark:bg-gray-800 bg-opacity-95 border-opacity-60 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-{{ $colors[array_rand($colors)] }}-400 dark:hover:bg-{{ $colors[array_rand($colors)] }}-600 hover:border-transparent | transition-colors duration-500">
                        <img class="max-h-16 object-cover" src="{{ $skill['img'] }}" alt="{{ $skill['skill'] }}" />
                        <div class="flex flex-col justify-center">
                            <p class="text-gray-900 dark:text-gray-300 font-semibold">{{ $skill['skill'] }}</p>
                            <p class="text-black dark:text-gray-100 text-justify">{{ $skill['experience'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="" id="resume">

        </div>
    </div>

    <style>
        .active{
            display: block;
        }    
    </style>

    {{-- expand and hide the hamburger menu on mobile --}}
    <script>
        let hamburger = document.getElementById('hamburger');
    
        let mobileMenu = document.getElementById('mobile-nav');
    
        hamburger.addEventListener('click', function(){
            mobileMenu.classList.toggle('active');
        });
    </script>

    {{-- Toggle dark/light modes --}}
    <script>
        let colorButton = document.getElementById('color-mode');

        let parentElement = document.getElementsByTagName('body')[0];

        colorButton.addEventListener('click', function() {
            if (parentElement.classList.value === 'dark') {
                parentElement.classList.remove('dark');
                colorButton.textContent = 'Dark Mode';
            } else {
                parentElement.classList.add('dark');
                colorButton.textContent = 'Light Mode';
            }
        });
    </script>
</body>

