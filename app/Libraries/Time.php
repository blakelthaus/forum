<?php

namespace App\Libraries;

use Carbon\Carbon;
use GuzzleHttp\Client;

class Time
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getUserTimeZone()
    {
        $userIp = $_SERVER['REMOTE_ADDR'];
        $ipData = $this->getUserIpInfo($userIp);
        dd($ipData);

    }

    public function convertUtcToUserTimezone()
    {

    }

    private function getUserIpInfo($ip)
    {
        $json = $this->client->request('GET', 'http://freegeoip.io/json/' . $ip);
        dd($json);
    }
}
