@extends('layouts.basic')

@section('content')

    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawWinsChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Games');
            data.addColumn('number', 'Results');
            data.addRows([
                ['Wins', {{ $stats['numeric']->wins }}],
                ['Losses', {{ $stats['numeric']->losses }}],
                ['OT', {{ $stats['numeric']->ot }}]
            ]);

            var options = {'title':'VGK Win Loss Tracker',
                'width':400,
                'height':250};

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_wins'));
            chart.draw(data, options);
        }

        function drawShotsAllowedChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Taken');
            data.addColumn('number', 'Allowed');
            data.addRows([
                ['Taken', {{ $stats['numeric']->shotsPerGame }}],
                ['Allowed', {{ $stats['numeric']->shotsAllowed }}],
            ]);

            var options = {'title':'VGK Avg. Shots Taken/Allowed Per Game',
                'width':400,
                'height':250};

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_shots'));
            chart.draw(data, options);
        }

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            drawWinsChart();
            drawShotsAllowedChart();
        }
    </script>

    <h1 class="text-5xl font-bold">{{ $team->name }}</h1>

    <div class="flex mb-4 pt-10">
        <div class="w-1/3">
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
            <div id="chart_div_wins"></div>
            <div id="chart_div_shots"></div>
        </div>
        <div class="w-1/3">
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
        <div class="w-1/3">
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
        </div>
    </div>

@endsection
