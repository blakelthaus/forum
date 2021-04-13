<?php

namespace App\Http\Controllers;

use App\Libraries\NhlLibrary;
use Illuminate\Http\Request;

class KnightsController extends Controller
{

    protected $nhlLibrary;
    protected $vgkId;
    protected $eventCalendar;

    public function __construct(NhlLibrary $nhlLibrary)
    {
        $this->nhlLibrary = $nhlLibrary;
        $this->vgkId = 54;
    }

    public function index()
    {
        $team = $this->nhlLibrary->getTeam($this->vgkId);
        $teamStats = $this->nhlLibrary->getStatsSummaryForDisplay($this->vgkId);
        $previousGame = $this->nhlLibrary->getPreviousGameResults($this->vgkId);
        $nextGame = $this->nhlLibrary->getUpcomingGameInfo($this->vgkId);

        return view('vgk.index', ['team' => $team, 'stats' => $teamStats, 'previousGame' => $previousGame, 'nextGame' => $nextGame]);
    }

    public function player(Request $request, $playerId)
    {
        $playerStats = $this->nhlLibrary->getPlayerSpecificStats($playerId);

        return view('vgk.player-profile', ['info' => $playerStats['info'], 'stats' => $playerStats['stats']]);
    }

    public function players()
    {
        $players = $this->nhlLibrary->getTeamRoster($this->vgkId);
        $playerStats = $this->nhlLibrary->getAllPlayerStats($players);

        return view('vgk.players', ['players' => $players, 'playerStats' => $playerStats]);
    }

    public function games()
    {
        $upcomingGames = $this->nhlLibrary->getUpcomingGames($this->vgkId, true);

        $events = $this->createCalendarEvents($upcomingGames);

        return view('vgk.games', ['events' => $events]);
    }

    public function standings()
    {
        $nhlStandings = $this->nhlLibrary->getTeamsByConferenceDivisionAndRank($this->vgkId);
        return view('vgk.standings', ['standings' => $nhlStandings, 'vgkId' => $this->vgkId]);
    }

    private function createCalendarEvents($games)
    {
        $events = [];
        foreach ($games as $game) {
            $events[] = Calendar::event(
                $game['name'],
                false,
                $game['date'],
                $game['date']->copy()->addHours(3),
                0
            );
        }
        return $events;
    }
}
