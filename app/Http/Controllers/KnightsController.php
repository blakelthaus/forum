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
        $players = $this->nhlLibrary->getTeamRoster($this->vgkId);
        $games = $this->nhlLibrary->getUpcomingGames($this->vgkId);
        $teamStats = $this->nhlLibrary->getStatsSummaryForDisplay($this->vgkId);
//        dd($teamStats);
        return view('vgk.index', ['team' => $team, 'players' => $players, 'games' => $games, 'stats' => $teamStats]);
    }

    public function player(Request $request, $playerId)
    {
        $playerStats = $this->nhlLibrary->getPlayerSpecificStats($playerId);

        return view('vgk.player-profile', ['info' => $playerStats['info'], 'stats' => $playerStats['stats']]);
    }
}
