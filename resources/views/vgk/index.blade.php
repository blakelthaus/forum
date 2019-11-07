@extends('layouts.vgk')

@section('content')

    @include('vgk.charts')

    <div class="w-0 md:w-1/5"></div>
    <div class="w-100 md:w-3/5">
        <div class="w-100">
            <a class="text-3xl text-blue-300 p-2" href="{{ env('APP_URL', 'https://blakeborgholthaus.com') }}" title="home">< Home</a>

            <h1 class="text-5xl font-bold p-3">{{ $team->name }} via NHL Open API</h1>

            <div class="lg:flex lg:flex-column xl:flex-row mb-4 pt-10">
                <div class="lg:w-11/12 xl:w-1/2">
                    <div class="rounded overflow-hidden shadow-lg p-3 m-8">
                        @include('vgk.recent-games')
                    </div>
                    <div class="rounded overflow-hidden shadow-lg p-3 m-8">
                        @include('vgk.next-game')
                    </div>
                    <div class="rounded overflow-hidden shadow-lg p-3 m-8">
                        @include('vgk.team')
                    </div>
                </div>
                <div class="lg:w-11/12 xl:w-1/2">
                    <div class="rounded overflow-hidden shadow-lg p-3 m-8">
                        @include('vgk.stats')
                    </div>
                    <div class="rounded overflow-hidden shadow-lg p-3 m-8" id="chart_div_wins"></div>
                    <div class="rounded overflow-hidden shadow-lg p-3 m-8" id="chart_div_shots"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-0 md:w-1/5"></div>



@endsection
