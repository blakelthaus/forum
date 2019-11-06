<h2 class="text-4xl">Stats This Season</h2>
<ul>
    <li>Games Played: {{ $stats['numeric']->gamesPlayed }}</li>
    <li>Total Points: {{ $stats['numeric']->pts }}</li>
    <li>Power Play Goals: {{ $stats['numeric']->powerPlayGoals }}</li>
</ul>
<div id="chart_div_wins"></div>
<div id="chart_div_shots"></div>
