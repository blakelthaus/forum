@extends('layouts.blake')

@section('content')

<div id="home-page">
    <div class="py-10 px-10 my-10 mx-10 max-w-md rounded overflow-hidden shadow-lg">
        <img class="w-full" src="/img/zootah.jpg" alt="Zootah Wordpress Site">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Zootah, not the zoo you knew</div>
            <p class="text-gray-700 text-base">
                Wordpress Site built in Systems Development Life Cycle Class
            </p>
        </div>
    </div>
    <div class="py-10 px-10 my-10 mx-10 max-w-md rounded overflow-hidden shadow-lg">
        <img class="w-full" src="/img/zootah.jpg" alt="Sigma Chi Derby Days">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Sigma Chi Derby Days</div>
            <p class="text-gray-700 text-base">
                Wordpress Site built for the Sigma Chi Fraternity to use for fundraising.
            </p>
        </div>
    </div>
</div>

@endsection
