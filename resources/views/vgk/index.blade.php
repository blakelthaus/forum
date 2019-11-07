@extends('layouts.vgk')

@section('content')

    @include('vgk.charts')

    <div class="m-auto">
        <div class="w-100">
            <a class="text-3xl text-blue-300" href="{{ env('APP_URL', 'https://blakeborgholthaus.com') }}" title="home">< Home</a>

            <h1 class="text-5xl font-bold">{{ $team->name }} via NHL Open API</h1>

            <div class="lg:flex lg:flex-column xl:flex-row mb-4 pt-10">
                <div class="lg:w-11/12 xl:w-1/2">
                    <div>
                        @include('vgk.recent-games')
                    </div>
                    <div>
                        @include('vgk.next-game')
                    </div>
                    <div>
                        @include('vgk.team')
                    </div>
                </div>
                <div class="lg:w-11/12 xl:w-1/2">
                    @include('vgk.stats')
                </div>
            </div>
        </div>
    </div>



@endsection
