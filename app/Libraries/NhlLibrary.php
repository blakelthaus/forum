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

    public function getPreviousGameResults($id)
    {
        $uri = $this->baseUri . $id . '?expand=team.schedule.previous';
        $team = $this->makeApiCall($uri);
        $game = $team->teams[0]->previousGameSchedule->dates[0]->games[0];
        $home = ($game->teams->home->team->id == $id) ? true : false;

        return $this->sortPreviousGameInfo($home, $game);
    }

    public function getUpcomingGameInfo($id)
    {
        $games = $this->getUpcomingGames($id);
        $gamesArray = $games->toArray();
        $nextGame = $gamesArray[0];
        return $nextGame;
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

    public function getUpcomingGames($id, $calendar=false)
    {
        $now = new Carbon();
        $from = $calendar ? $now->copy()->subMonths(6)->format('Y-m-d') : $now->copy()->format('Y-m-d');
        $to = $now->addMonths(6)->copy()->format('Y-m-d');
        $uri = 'https://statsapi.web.nhl.com/api/v1/schedule?teamId='. $id .'&startDate='. $from .'&endDate='. $to;
        $games = $this->makeApiCall($uri);

        return $this->sortScheduledGames($games, $calendar);
    }

    public function getStatsSummaryForDisplay($id)
    {
        $uri = $this->baseUri . $id .'?expand=team.stats';
        $stats = $this->makeApiCall($uri);

        $finalStats = $this->sortFinalStatsFromResponse($stats->teams[0]->teamStats[0]->splits);

        return $finalStats;
    }

    public function getPlayerSpecificStats($playerId)
    {
        list($uri, $playerInfo) = $this->getPlayerBasicInformation($playerId);

        $playerStats = $this->getPlayerSingleSeasonStats($uri);

        return [
            'info' => $playerInfo->people[0],
            'stats' => $playerStats->stats[0]->splits[0]->stat,
        ];
    }


    public function getAllPlayerStats($players)
    {
        $stats = [];
        foreach($players as $player) {
            $stats[$player->person->id] = $this->getPlayerSpecificStats($player->person->id);
        }

        return $stats;
    }

    public function getTeamsByConferenceDivisionAndRank($id)
    {
        $teams = $this->makeApiCall($this->baseUri . '?expand=team.stats');
        $teamsSorted = $this->sortTeamsByDivisionAndPoints($teams->teams);

        return $teamsSorted;
    }

    private function sortTeamsByDivisionAndPoints($teams)
    {
        $conferenceNames = $this->getConferenceNames();
        $divisionNames = $this->getDivisionNames();
        $teamsByConference = [];
        foreach ($teams as $team) {
            $stats = $team->teamStats[0]->splits[0];
            $teamsByConference[$team->conference->id][$team->division->id][] = $stats;
            usort($teamsByConference[$team->conference->id][$team->division->id], function($a, $b) {
                return $a->stat->pts <= $b->stat->pts;
            });
            ksort($teamsByConference[$team->conference->id]);
            ksort($teamsByConference);
        }
        return [
            'conferences' => $conferenceNames,
            'divisions' => $divisionNames,
            'teams' => $teamsByConference
        ];
    }

    private function sortFinalStatsFromResponse($splitStats)
    {
        $stats = [
            'numeric' => $splitStats[0]->stat,
            'rankings' => $splitStats[1]->stat,
        ];

        return $stats;
    }

    private function sortScheduledGames($games, $calendar)
    {
        $scheduledGames = array_reduce($games->dates, function ($carry, $gameDay) use ($calendar) {
            $final = ($gameDay->games[0]->status->detailedState == 'Final') ? true : false;
            $homeTeamName = $gameDay->games[0]->teams->home->team->name;
            $awayTeamName = $gameDay->games[0]->teams->away->team->name;
            $homeTeamRecord = $gameDay->games[0]->teams->home->leagueRecord;
            $awayTeamRecord = $gameDay->games[0]->teams->away->leagueRecord;
            $homeTeamScore = $gameDay->games[0]->teams->home->score;
            $awayTeamScore = $gameDay->games[0]->teams->away->score;
            $gameDate = new Carbon($gameDay->games[0]->gameDate);

            if ($calendar) {
                $carry[] = [
                    'date' => $gameDate->setTimezone('America/Los_Angeles'),
                    'name' => $this->getCalendarEventNameFromTeams($final, $homeTeamName, $awayTeamName, $homeTeamScore, $awayTeamScore),
                    'homeTeamRecord' => '(' . $homeTeamRecord->wins . ' - ' . $homeTeamRecord->losses . ' - ' . $homeTeamRecord->ot . ')',
                    'awayTeamRecord' => '(' . $awayTeamRecord->wins . ' - ' . $awayTeamRecord->losses . ' - ' . $awayTeamRecord->ot . ')',
                ];
            } else {
                $carry[] = [
                    'date' => $gameDate->toFormattedDateString(),
                    'homeTeam' => $homeTeamName,
                    'homeTeamRecord' => '(' . $homeTeamRecord->wins . ' - ' . $homeTeamRecord->losses . ' - ' . $homeTeamRecord->ot . ')',
                    'awayTeam' => $awayTeamName,
                    'awayTeamRecord' => '(' . $awayTeamRecord->wins . ' - ' . $awayTeamRecord->losses . ' - ' . $awayTeamRecord->ot . ')',
                ];
            }
            return $carry;
        }, collect([]));

        return $scheduledGames;
    }

    private function getCalendarEventNameFromTeams($final, $homeTeamName, $awayTeamName, $homeTeamScore, $awayTeamScore)
    {
        $homeTeamAbbreviation = $this->parseAbbreviationFromName($homeTeamName);
        $awayTeamAbbreviation = $this->parseAbbreviationFromName($awayTeamName);

        $isHome = ($homeTeamAbbreviation == 'VGK');
        $separator = ($isHome) ? ' VS ' : ' @ ';

        if ($isHome) {
            $score = ($final) ? " ($homeTeamScore-$awayTeamScore) " : '';
            $title = $homeTeamAbbreviation . $separator . $awayTeamAbbreviation;
        } else {
            $score = ($final) ? " ($awayTeamScore-$homeTeamScore) " : '';
            $title = $awayTeamAbbreviation . $separator . $homeTeamAbbreviation;
        }

        return $title . $score;
    }

    private function parseAbbreviationFromName($name)
    {
        $words = explode(' ', $name);
        $abbreviation = '';
        foreach ($words as $word) {
            $abbreviation .= $word[0];
        }

        return strtoupper($abbreviation);
    }

    public function getNextGame($id)
    {

    }

    public function getLastgame($id)
    {

    }

    public function getTeamStats($id)
    {
        return $this->makeApiCall($this->baseUri . '/' . $id . '?expand=team.stats');
    }

    public function getTeamHistoricRoster($id)
    {

    }

    public function getMultipleTeams($ids)
    {

    }

    /**
     * @param string $uri
     * @return mixed
     */
    private function getPlayerSingleSeasonStats(string $uri)
    {
        $statsUri = $uri . '/stats?stats=statsSingleSeason';
        $playerStats = $this->makeApiCall($statsUri);
        return $playerStats;
    }

    /**
     * @param $playerId
     * @return array
     */
    private function getPlayerBasicInformation($playerId)
    {
        $uri = 'https://statsapi.web.nhl.com/api/v1/people/' . $playerId;
        $playerInfo = $this->makeApiCall($uri);
        return array($uri, $playerInfo);
    }

    /**
     * @param bool $home
     * @param $game
     * @return array
     */
    private function sortPreviousGameInfo(bool $home, $game): array
    {
        $date = new Carbon($game->gameDate);

        $previousGameInfo = [
            'date' => $date->toFormattedDateString(),
            'home' => $home,
            'knights' => ($home == true) ? $game->teams->home->team->name : $game->teams->away->team->name,
            'knightsScore' => ($home == true) ? $game->teams->home->score : $game->teams->away->score,
            'otherTeam' => ($home == true) ? $game->teams->away->team->name : $game->teams->home->team->name,
            'otherScore' => ($home == true) ? $game->teams->away->score : $game->teams->home->score,
        ];

        $previousGameInfo['vgkWin'] = $previousGameInfo['knightsScore'] > $previousGameInfo['otherScore'] ? true : false;
        return $previousGameInfo;
    }

    private function getConferenceNames()
    {
        return [
            6 => 'Eastern',
            5 => 'Western'
        ];
    }

    private function getDivisionNames()
    {
        return [
            18 => 'Metropolitan',
            17 => 'Atlantic',
            16 => 'Central',
            15 => 'Pacific',
        ];
    }


}
