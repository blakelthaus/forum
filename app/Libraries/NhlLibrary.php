<?php

namespace App\Libraries;

use Carbon\Carbon;
use GuzzleHttp\Client;

class NhlLibrary
{
    private $client;
    private $method;
    private $baseUri;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->method = 'GET';
        $this->baseUri = 'https://statsapi.web.nhl.com/api/v1/teams/';
    }

    public function makeApiCall($uri)
    {
        $request = $this->client->request($this->method, $uri); //assemble the request from provided params

        return json_decode($request->getBody()->getContents()); //return an array of the response contents
    }

    public function getTeams()
    {
        $teams = $this->makeApiCall($this->baseUri);
        return $teams->teams;
    }

    public function getTeam($id)
    {
        $uri = $this->baseUri . $id;
        $team = $this->makeApiCall($uri);
        return $team->teams[0];
    }

    public function getTeamRoster($id)
    {
        $uri = $this->baseUri . $id . '/roster';
        $players = $this->makeApiCall($uri);
        return $players->roster;
    }

    public function getTeamPlayers($id)
    {
        $uri = $this->baseUri . $id . '?expand=team.roster';
        $players = $this->makeApiCall($uri);
        return $players->teams[0]->roster->roster;
    }

    public function getUpcomingGames($id)
    {
        $now = new Carbon();
        $from = $now->copy()->format('Y-m-d');
        $to = $now->addMonths(12)->copy()->format('Y-m-d');
        $uri = 'https://statsapi.web.nhl.com/api/v1/schedule?teamId='. $id .'&startDate='. $from .'&endDate='. $to;
        $games = $this->makeApiCall($uri);

        return $this->sortScheduledGames($games);
    }

    public function getStatsSummaryForDisplay($id)
    {
        $uri = $this->baseUri . $id .'?expand=team.stats';
        $stats = $this->makeApiCall($uri);

        $finalStats = $this->sortFinalStatsFromResponse($stats->teams[0]->teamStats[0]->splits);

        return $finalStats;
    }

    private function sortFinalStatsFromResponse($splitStats)
    {
        $stats = [
            'numeric' => $splitStats[0]->stat,
            'rankings' => $splitStats[1]->stat,
        ];

        return $stats;
    }

    private function sortScheduledGames($games)
    {
        $scheduledGames = array_reduce($games->dates, function ($carry, $gameDay) {
            $homeTeamRecord = $gameDay->games[0]->teams->home->leagueRecord;
            $awayTeamRecord = $gameDay->games[0]->teams->away->leagueRecord;
            $gameDate = new Carbon($gameDay->games[0]->gameDate);

            $carry[] = [
                'date' => $gameDate->format('m-d-Y'),
                'homeTeam' => $gameDay->games[0]->teams->home->team->name,
                'homeTeamRecord' => '(' . $homeTeamRecord->wins . ' - ' . $homeTeamRecord->losses . ' - ' . $homeTeamRecord->ot . ')',
                'awayTeam' => $gameDay->games[0]->teams->away->team->name,
                'awayTeamRecord' => '(' . $awayTeamRecord->wins . ' - ' . $awayTeamRecord->losses . ' - ' . $awayTeamRecord->ot . ')',
            ];

            return $carry;
        }, collect([]));
        return $scheduledGames;
    }

    public function getNextGame($id)
    {

    }

    public function getLastgame($id)
    {

    }

    public function getTeamStats($id)
    {

    }

    public function getTeamHistoricRoster($id)
    {

    }

    public function getMultipleTeams($ids)
    {

    }


}
