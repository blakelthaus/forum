@extends('layouts.vgk')

@section('content')
    <script>
        function showDetails(playerID) {
            var detailsDivName = 'details-' + playerID;
            var playerDetails = document.getElementById(detailsDivName);
            if (playerDetails.style.display === 'block') {
                playerDetails.style.display = 'none';
            } else {
                playerDetails.style.display = 'block';
            }
        }
    </script>
    <div class="w-0 md:w-1/5"></div>
    <div class="w-100 md:w-3/5">
        <h1 class="text-5xl p-3">Player Info</h1>
        <div class="flex-row">
            @foreach ($players as $player)
                <div class="rounded overflow-hidden shadow-lg p-3 m-8">
                    <div class="float-left">
                        <p class="text-2xl font-bold">{{ $player->person->fullName }}</p>
                        <ul class="">
                            <li><span class="font-bold">Jersey Number</span>: {{ $player->jerseyNumber }}</li>
                            <li><span class="font-bold">Position:</span> {{ $player->position->name }}</li>
                        </ul>
                    </div>
                    <div class="float-right">
                        <button onclick="showDetails({{ $player->person->id }})">More</button>
                    </div>
                </div>
                <div class="hidden rounded overflow-hidden shadow-lg p-3 m-8" id="details-{{ $player->person->id }}">
                    @include('vgk.player-profile')
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-0 md:w-1/5"></div>
@endsection
