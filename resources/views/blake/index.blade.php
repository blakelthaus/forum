@extends('layouts.blake')

@section('content')

<div id="home-page" >
    <div id="about-me" class="flex flex-row">
        <div class="px-10 py-10">
            <h2 class="text-gray-900 text-4xl">About Me</h2>
            <p class="text-gray-600">I like Computers, Skiing and Biking.</p>
        </div>
    </div>
    <div id="projects">
        <div class="px-10">
            <h2 class="text-gray-900 text-4xl">Projects</h2>
        </div>
        @foreach ($cards as $card)
            <div class="flex flex-row">
                <div class="px-10 py-10">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <a href="{{ $card['Link'] }}"><img class="w-full" src="{{ $card['Image'] }}" alt="Sigma Chi Derby Days"></a>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2"><a href="{{ $card['Link'] }}">{{ $card['Title'] }}</a></div>
                            <p class="text-gray-700 text-base">
                                {{ $card['Description'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
