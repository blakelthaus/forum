@extends('layouts.app')

@section('content')

    <h1 class="text-5xl font-bold">{{ $team->name }}</h1>

    <div class="flex mb-4 pt-10">
        <div class="w-1/4">
            <h2 class="text-4xl">Team Info</h2>
            <ul>
                <li>Location: {{ $team->locationName }}</li>
                <li>First Year of Play: {{ $team->firstYearOfPlay }}</li>
                <li>Division: {{ $team->division->name }} ({{ $team->division->nameShort }})</li>
                <li>Conference: {{ $team->conference->name }}</li>
                <li>Franchise: {{ $team->franchise->teamName }}</li>
                <li>Website Url: <a href="{{ $team->officialSiteUrl }}">{{ $team->officialSiteUrl }}</a></li>
            </ul>
        </div>
        <div class="w-1/4">
            <h2 class="text-4xl">Player Info</h2>
            @foreach ($players as $player)
                <div class="pt-6">
                    <form method="post" action="/vgk/player/{{ $player->person->id }}">
                        <input type="hidden" name="" value="{{ $player->person->link }}">
                        <p class="text-2xl font-bold">{{ $player->person->fullName }}</p>
                        <ul>
                            <li><span class="font-bold">Jersey Number</span>: {{ $player->jerseyNumber }}</li>
                            <li><span class="font-bold">Position:</span> {{ $player->position->name }}</li>
                        </ul>
                        <input type="submit" value="Learn More">
                    </form>
                </div>
            @endforeach
        </div>
        <div class="w-1/2">
            <h2 class="text-4xl">Upcoming Games</h2>
            @foreach ($games as $game)
                <p>Game Day: {{ $game['date'] }}</p>
                <div class="pt-2 flex flex-row">
                    <div class="w-2/5">
                        <p><span class="font-bold">{{ $game['homeTeam'] }}</span> {{ $game['homeTeamRecord'] }}</p>
                    </div>
                    <div class="w-1/5 align-content-center">
                        <p>VS</p>
                    </div>
                    <div class="w-2/5">
                        <p><span class="font-bold">{{ $game['awayTeam'] }}</span> {{ $game['awayTeamRecord'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
