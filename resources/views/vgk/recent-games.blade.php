<div class="">
    <h2 class="text-4xl">Previously:</h2>
    <div class="flex flex-column p-3" id="results-container">
        <p>{{ $previousGame['date'] }}</p>
        <div class="w-50">
            <div class="text-2xl {{ $previousGame['vgkWin'] == true ? 'font-bold text-green-400' : '' }}" id="knights-score">
                <span>{{ $previousGame['knights'] }}</span><span class="float-right text-3xl">{{ $previousGame['knightsScore'] }}</span>
            </div>
            <div class="text-2xl {{ $previousGame['vgkWin'] == false ? 'font-bold text-red-400' : '' }}" id="other-score">
                <span>{{ $previousGame['otherTeam'] }}</span><span class="float-right text-3xl">{{ $previousGame['otherScore'] }}</span>
            </div>
        </div>
    </div>
</div>

