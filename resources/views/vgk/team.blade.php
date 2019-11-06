@extends('vgk.index)

@section('team')
    <h2 class="text-4xl">Team Info</h2>
    <ul>
        <li>Location: {{ $team->locationName }}</li>
        <li>First Year of Play: {{ $team->firstYearOfPlay }}</li>
        <li>Division: {{ $team->division->name }} ({{ $team->division->nameShort }})</li>
        <li>Conference: {{ $team->conference->name }}</li>
        <li>Franchise: {{ $team->franchise->teamName }}</li>
        <li>Website Url: <a href="{{ $team->officialSiteUrl }}">{{ $team->officialSiteUrl }}</a></li>
    </ul>
    <h2 class="text-4xl pt-5">Stats This Season</h2>
    <ul>
        <li>Games Played: {{ $stats['numeric']->gamesPlayed }}</li>
        <li>Total Points: {{ $stats['numeric']->pts }}</li>
        <li>Power Play Goals: {{ $stats['numeric']->powerPlayGoals }}</li>
    </ul>
@endsection
