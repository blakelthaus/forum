@extends('layouts.vgk')

@section('content')
    <h1 class="text-5xl">Player Info</h1>
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
@endsection
