<div class="">
    <h2 class="text-4xl">
        Previously: <span class="{{ $previousGame['vgkWin'] == true ? 'font-bold text-green-400' : 'font-bold text-red-400' }}">{{ $previousGame['vgkWin'] == true ? 'Win!' : 'Loss'  }}</span>
    </h2>
    <div class="p-3" id="results-container">
        <p>{{ $previousGame['date'] }}</p>
        <table class="w-100">
            <tr class="flex-row text-2xl w-100 {{ $previousGame['vgkWin'] == true ? 'font-bold text-green-400' : '' }}">
                <td>{{ $previousGame['knights'] }}</td>
                <td class="text-3xl flex-grow-1">{{ $previousGame['knightsScore'] }}</td>
            </tr>
            <tr class="flex-row text-2xl w-100 {{ $previousGame['vgkWin'] == false ? 'font-bold text-red-400' : '' }}">
                <td>{{ $previousGame['otherTeam'] }}</td>
                <td class="text-3xl flex-grow-1">{{ $previousGame['otherScore'] }}</td>
            </tr>
        </table>
    </div>
</div>

