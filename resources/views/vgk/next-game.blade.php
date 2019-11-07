<h2 class="text-4xl">Up Next:</h2>
<div class="p-6">
    <div class="border-2 p-6">
        <p class="font-3xl font-bold">{{ $nextGame['date'] }}</p>
        <div class="pt-2 pb-2 flex flex-row">
            <div class="w-2/5">
                <p><span class="font-bold">{{ $nextGame['homeTeam'] }}</span> </p>
                <p>{{ $nextGame['homeTeamRecord'] }}</p>
            </div>
            <div class="w-1/5 align-content-center">
                <p>VS</p>
            </div>
            <div class="w-2/5">
                <p><span class="font-bold">{{ $nextGame['awayTeam'] }}</span></p>
                <p>{{ $nextGame['awayTeamRecord'] }}</p>
            </div>
        </div>
    </div>
</div>
