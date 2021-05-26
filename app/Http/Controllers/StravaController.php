<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Strava;
use App\Models\StravaUsers;
use Carbon\Carbon;

class StravaController extends Controller
{
    //go to strava.com for oauth and then redirect to /strava/profile once authorized
    public function index() {
        return Strava::authenticate($scope='read_all,profile:read_all,activity:read_all');
    }

    public function athleteProfile($athleteID) {
        
        //get user and activities using information from previous authorization in profile()
        $user = StravaUsers::where('athlete_id', $athleteID)->first();
        $athlete = $this->verifyAndRetrieveAthlete($user);
        $activities = Strava::activities($user->access_token, 1, 15);

        //sort activities into 2d array that is easier to use in the view
        $sortedActivities = $this->sortActivities($activities);

        return view('strava.index', ['athlete' => $athlete, 'activities' => $sortedActivities]);
    }

    //create user porifle and handle strava authorization then redirect to /profile/athleteID
    public function profile(Request $request)
    {
        $token = Strava::token($request->code); //get access token for strava user after finishing inital auth
        $user = $this->addOrLookupStravaUser($token);

        return redirect('/strava/profile/' . $user->athlete_id);
    }

    private function verifyAndRetrieveAthlete($user) 
    {
        if (strtotime(Carbon::now()) > $user->expires_at) {
            //token is expired get new one
            $refresh = Strava::refreshToken($user->refresh_token);
            $user->access_token = $refresh->access_token;
            $user->refresh_token = $refresh->refresh_token;
            $user->save();
        }

        return Strava::athlete($user->access_token);

    }

    //search to see if user already exists in the database and if not add them
    private function addOrLookupStravaUser($token) 
    {
        $existingUser = $this->searchForStravaUser($token);
        if ($existingUser->isEmpty()) {
            $stravaUser = $this->addStravaUser($token);
        } else {
            $existingUser[0]->access_token = $token->access_token;
            $existingUser[0]->refresh_token = $token->refresh_token;
            $existingUser[0]->save();
            $stravaUser = $existingUser;
        }
        
        return $stravaUser[0];
    }

    private function searchForStravaUser($token) 
    {
        $existingUser = StravaUsers::where('athlete_id', $token->athlete->id)->get();
        return $existingUser;
    }

    private function addStravaUser($token)
    {
        $stravaUser = new StravaUsers;

        $stravaUser->expires_at = $token->expires_at;
        $stravaUser->refresh_token = $token->refresh_token;
        $stravaUser->access_token = $token->access_token;
        $stravaUser->athlete_id = $token->athlete->id;
        $stravaUser->username = $token->athlete->username;

        $stravaUser->save();

        return $stravaUser;
    }

    private function sortActivities($activities) 
    {
        $sortedActivities = [];
        foreach ($activities as $key => $activity) {
            $sortedActivities[$key] = [
                'name' => $activity->name,
                'distance' => round(($activity->distance * 0.000621371192), 2) . ' Miles',
                'moving_time' => gmdate("H:i:s", $activity->moving_time),
                'elapsed_time' => gmdate("H:i:s", $activity->elapsed_time),
                'elevation_gain' => round(($activity->total_elevation_gain * 3.2808399), 0) . ' ft',
                'type' => $activity->type,
                'date' => Carbon::parse($activity->start_date_local)->diffForHumans()
            ];
        }
        return $sortedActivities;
    }


}
