@extends('layouts.header')

@section('content')
        {{-- body content of homepage --}}
        <div class="container my-12 mx-auto px-4 md:px-12 h-screen" id="sites">
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
                    <div class="my-1 px-1 w-full md:w-1/3 lg:my-4 lg:px-4 lg:w-1/5">
                        <div class="shadow-sm dark:bg-gray-800 bg-opacity-95 border-opacity-60 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-{{ $colors[array_rand($colors)] }}-400 dark:hover:bg-{{ $colors[array_rand($colors)] }}-600 hover:border-transparent | transition-colors duration-500">
                            <img class="w-16 h-16 object-cover p-2" src="{{ $skill['img'] }}" alt="{{ $skill['skill'] }}" />
                            <div class="flex flex-col justify-center">
                                <p class="text-gray-900 dark:text-gray-300 font-semibold">{{ $skill['skill'] }}</p>
                                <p class="text-black dark:text-gray-100 text-justify">{{ $skill['experience'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="" id="resume">

        </div>

@endsection