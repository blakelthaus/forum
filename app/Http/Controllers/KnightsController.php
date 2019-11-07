<?php

namespace App\Http\Controllers;

use App\Libraries\NhlLibrary;
use Illuminate\Http\Request;

class KnightsController extends Controller
{

    protected $nhlLibrary;
    protected $vgkId;

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
        $games = $this->nhlLibrary->getUpcomingGames($this->vgkId);

        return view('vgk.games', ['games' => $games]);
    }
}
