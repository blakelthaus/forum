@extends('layouts.basic')

@section('content')
    <div class="w-11/12 " id="player-container">
        <a class="text-2xl p-5 text-blue-300" href="/vgk"> < Back To Team Info</a>
        <h1 class="text-5xl font-bold p-5">{{ $info->fullName }}</h1>
        <div class="flex flex-row">
            <div class="w-1/3 p-5" id="basic-info">
                <h2 class="text-3xl">Basic Info</h2>
                <ul>
                    <li><b>Number: </b>{{ isset($info->primaryNumber) ? $info->primaryNumber : '?' }}</li>
                    <li><b>Birth Date: </b>{{ isset($info->birthDate) ? $info->birthDate : '?' }}</li>
                    <li><b>Age: </b>{{ isset($info->currentAge) ? $info->currentAge : '?' }}</li>
                    <li><b>Birth City: </b>{{ isset($info->birthCity) ? $info->birthCity : '?' }}</li>
                    <li><b>Birth State/Province: </b>{{ isset($info->birthStateProvince) ? $info->birthStateProvince : '?' }}</li>
                    <li><b>Birth Country: </b>{{ isset($info->birthCountry) ? $info->birthCountry : '?' }}</li>
                    <li><b>Height: </b>{{ isset($info->height) ? $info->height : '?' }}</li>
                    <li><b>Weight: </b>{{ isset($info->weight) ? $info->weight : '?' }}</li>
                </ul>
            </div>
            <div class="w-1/3 p-5" id="season-stats">
                <h2 class="text-3xl">Season Stats so far this Season</h2>
                <ul>
                    <li><b>Time on Ice:</b> {{ isset($stats->timeOnIce) ? $stats->timeOnIce : 0 }}</li>
                    <li><b>Assists:</b> {{ isset($stats->assists) ? $stats->assists : 0 }}</li>
                    <li><b>Goals:</b> {{ isset($stats->goals) ? $stats->goals : 0 }}</li>
                    <li><b>Shots:</b> {{ isset($stats->shots) ? $stats->shots : 0 }}</li>
                    <li><b>Games:</b> {{ isset($stats->games) ? $stats->games : 0 }}</li>
                    <li><b>Hits:</b> {{ isset($stats->hits) ? $stats->hits : 0 }}</li>
                    <li><b>Power Play Time on Ice:</b> {{ isset($stats->powerPlayTimeOnIce) ? $stats->powerPlayTimeOnIce : 0 }}</li>
                    <li><b>Penalty Minutes:</b> {{ isset($stats->penaltyMinutes) ? $stats->penaltyMinutes : 0 }}</li>
                    <li><b>Avg Time on Ice per Game:</b> {{ isset($stats->timeOnIcePerGame) ? $stats->timeOnIcePerGame : 0 }}</li>
                </ul>
            </div>
        </div>

    </div>
@endsection
