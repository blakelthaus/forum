<div class="flex w-100" id="player-container">
    <div class="flex-wrap">
        <div class="p-2" id="basic-info">
            <h2 class="text-3xl">Basic Info</h2>
            <ul>
                <li><b>Number: </b>{{ isset($playerStats[$player->person->id]['info']->primaryNumber) ? $playerStats[$player->person->id]['info']->primaryNumber : '?' }}</li>
                <li><b>Birth Date: </b>{{ isset($playerStats[$player->person->id]['info']->birthDate) ? $playerStats[$player->person->id]['info']->birthDate : '?' }}</li>
                <li><b>Age: </b>{{ isset($playerStats[$player->person->id]['info']->currentAge) ? $playerStats[$player->person->id]['info']->currentAge : '?' }}</li>
                <li><b>Birth City: </b>{{ isset($playerStats[$player->person->id]['info']->birthCity) ? $playerStats[$player->person->id]['info']->birthCity : '?' }}</li>
                <li><b>Birth State/Province: </b>{{ isset($playerStats[$player->person->id]['info']->birthStateProvince) ? $playerStats[$player->person->id]['info']->birthStateProvince : '?' }}</li>
                <li><b>Birth Country: </b>{{ isset($playerStats[$player->person->id]['info']->birthCountry) ? $playerStats[$player->person->id]['info']->birthCountry : '?' }}</li>
                <li><b>Height: </b>{{ isset($playerStats[$player->person->id]['info']->height) ? $playerStats[$player->person->id]['info']->height : '?' }}</li>
                <li><b>Weight: </b>{{ isset($playerStats[$player->person->id]['info']->weight) ? $playerStats[$player->person->id]['info']->weight : '?' }}</li>
            </ul>
        </div>
        <div class="p-2" id="season-stats">
            <h2 class="text-3xl">This Season</h2>
            <ul>
                <li><b>Time on Ice:</b> {{ isset($playerStats[$player->person->id]['stats']->timeOnIce) ? $playerStats[$player->person->id]['stats']->timeOnIce : 0 }}</li>
                <li><b>Assists:</b> {{ isset($playerStats[$player->person->id]['stats']->assists) ? $playerStats[$player->person->id]['stats']->assists : 0 }}</li>
                <li><b>Goals:</b> {{ isset($playerStats[$player->person->id]['stats']->goals) ? $playerStats[$player->person->id]['stats']->goals : 0 }}</li>
                <li><b>Shots:</b> {{ isset($playerStats[$player->person->id]['stats']->shots) ? $playerStats[$player->person->id]['stats']->shots : 0 }}</li>
                <li><b>Games:</b> {{ isset($playerStats[$player->person->id]['stats']->games) ? $playerStats[$player->person->id]['stats']->games : 0 }}</li>
                <li><b>Hits:</b> {{ isset($playerStats[$player->person->id]['stats']->hits) ? $playerStats[$player->person->id]['stats']->hits : 0 }}</li>
                <li><b>Power Play Time on Ice:</b> {{ isset($playerStats[$player->person->id]['stats']->powerPlayTimeOnIce) ? $playerStats[$player->person->id]['stats']->powerPlayTimeOnIce : 0 }}</li>
                <li><b>Penalty Minutes:</b> {{ isset($playerStats[$player->person->id]['stats']->penaltyMinutes) ? $playerStats[$player->person->id]['stats']->penaltyMinutes : 0 }}</li>
                <li><b>Avg Time on Ice per Game:</b> {{ isset($playerStats[$player->person->id]['stats']->timeOnIcePerGame) ? $playerStats[$player->person->id]['stats']->timeOnIcePerGame : 0 }}</li>
            </ul>
        </div>
    </div>

</div>

