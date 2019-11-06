<h2 class="text-4xl">Previously:</h2>
<div class="flex flex-column p-3" id="results-container">
    <h3 class="text-2xl">
        {{ $previousGame['knights'] }}
        {{ $previousGame['home'] == true ? '  VS  ' : '  @  ' }}
        {{ $previousGame['otherTeam'] }}
    </h3>
    <span class="flex flex-row align-content-center align-middle text-2xl font-bold">({{ $previousGame['knightsScore'] }}  -  {{ $previousGame['otherScore'] }})</span>
</div>
