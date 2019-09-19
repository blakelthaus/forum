@extends('layouts.blake')

@section('content')

<div id="home-page" >
    <div id="about-me" class="flex flex-row">
        <div class="px-10 py-10">
            <h2 class="text-gray-900 text-4xl">About Me</h2>
            <p class="text-gray-600">Some info and stuff about me coming soon.</p>
        </div>
        <div id="bike-wheel" class="px-10 py-10 flex flex-row-reverse">
            <img class="w-1/6 h-100" src="/img/bike-tire.jpg" alt="Bike Tire">
        </div>
    </div>
    <div id="projects">
        <div class="px-10">
            <h2 class="text-gray-900 text-4xl">Projects</h2>
        </div>
        <div class="flex flex-column">
            <div class="px-10 py-10">
                <div class="max-w-md rounded overflow-hidden shadow-lg">
                    <a href="https://sigmachiderbydays.com"><img class="w-full" src="/img/derbydays.png" alt="Sigma Chi Derby Days"></a>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2"><a href="https://sigmachiderbydays.com">Sigma Chi Derby Days</a></div>
                        <p class="text-gray-700 text-base">
                            Wordpress Site built for the Sigma Chi Fraternity to use for fundraising.
                        </p>
                    </div>
                </div>
            </div>
            <div class="px-10 py-10">
                <div class="max-w-md rounded overflow-hidden shadow-lg">
                    <a href="/tailwind"><img class="w-full" src="/img/tailwind.png" alt="Tailwind Practice Image"></a>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2"><a href="/tailwind">Tailwind CSS Practice</a></div>
                        <p class="text-gray-700 text-base">
                            Tailwind Responsive Design Practice from screencasts on <a href="https://tailwindcss.com">tailwindcss.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="px-10 py-10">
                <div class="max-w-md rounded overflow-hidden shadow-lg">
                    <a href="https://zootah.org"><img class="w-full" src="/img/zootah.png" alt="Zootah Wordpress Site"></a>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2"><a href="https://zootah.org">Zootah, not the zoo you knew</a></div>
                        <p class="text-gray-700 text-base">
                            Wordpress Site built in Systems Development Life Cycle Class (MIS 5900)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
