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
    <nav class="flex items-center justify-between flex-wrap bg-gray-200 p-6 shadow-md dark:bg-gray-700">
        <div class="flex items-center flex-no-shrink text-white mr-6">
        <img class="h-12 w-12 mr-2 rounded-full" width="108" height="108" src="/img/blake.jpg" />
        <span class="font-semibold text-black text-xl tracking-tight dark:text-white">Test Site</span>
        </div>
        <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-black border-black hover:text-white hover:border-white dark:bg-white dark:text-gray-700 dark:border-white" id="hamburger">
            <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
        </div>
        <div class="w-full hidden flex-grow lg:pb-5 lg:flex lg:items-center lg:w-auto" id="mobile-nav">
        <div class="text-sm lg:flex-grow">
            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-600 mr-4 lg:ml-4 dark:text-white">
            Docs
            </a>
            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-600 mr-4 dark:text-white">
            Examples
            </a>
            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-600 dark:text-white">
            Blog
            </a>
        </div>
        <div>
            <a href="#" id="color-mode" class="inline-block text-sm px-4 py-2 shadow-md leading-none border rounded text-black border-gray-900 hover:border-transparent hover:text-white hover:bg-black mt-4 lg:mt-0 dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black">Dark Mode</a>
        </div>
        </div>
    </nav>

    <style>
        .active{
            display: block;
        }    
    </style>

    {{-- Script to expand the hamburger menu on mobile --}}
    <script>
        let hamburger = document.getElementById('hamburger');
    
        let mobileMenu = document.getElementById('mobile-nav');
    
        hamburger.addEventListener('click', function(){
            mobileMenu.classList.toggle('active');
        });
    </script>

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

