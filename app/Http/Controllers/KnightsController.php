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

        return view('vgk.index', ['team' => $team, 'players' => $players, 'games' => $games]);
    }
}
