@extends('vgk.index')

@section('games')
    <h2 class="text-4xl">Upcoming Games</h2>
    @foreach ($games as $game)
        <div class="border-2">
            <p class="font-3xl font-bold">Game Day: {{ $game['date'] }}</p>
            <div class="pt-2 pb-2 flex flex-row">
                <div class="w-2/5">
                    <p><span class="font-bold">{{ $game['homeTeam'] }}</span> </p>
                    <p>{{ $game['homeTeamRecord'] }}</p>
                </div>
                <div class="w-1/5 align-content-center">
                    <p>VS</p>
                </div>
                <div class="w-2/5">
                    <p><span class="font-bold">{{ $game['awayTeam'] }}</span></p>
                    <p>{{ $game['awayTeamRecord'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
