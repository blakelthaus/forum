@extends('layouts.blake')

@section('content')

<div id="home-page" class="flex flex-row">
    <div class="py-10 px-10 my-10 mx-10 max-w-md rounded overflow-hidden shadow-lg">
        <img class="w-full" src="/img/derbydays.png" alt="Sigma Chi Derby Days">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"><a href="https://sigmachiderbydays.com">Sigma Chi Derby Days</a></div>
            <p class="text-gray-700 text-base">
                Wordpress Site built for the Sigma Chi Fraternity to use for fundraising.
            </p>
        </div>
    </div>
    <div class="py-10 px-10 my-10 mx-10 max-w-md rounded overflow-hidden shadow-lg">
        <img class="w-full" src="/img/zootah.png" alt="Zootah Wordpress Site">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"><a href="https://zootah.org">Zootah, not the zoo you knew</a></div>
            <p class="text-gray-700 text-base">
                Wordpress Site built in Systems Development Life Cycle Class (MIS 5900)
            </p>
        </div>
    </div>

</div>

@endsection
