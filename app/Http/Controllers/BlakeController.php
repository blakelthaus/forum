<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlakeController extends Controller
{
    public function index()
    {
        $cards = $this->grabCardInfoArray();
        return view('blake.index', ['cards' => $cards]);
    }

    public function contact()
    {
        return view('blake.contact');
    }

    public function resume()
    {
        return view('blake.resume');
    }

    private function grabCardInfoArray()
    {
        return [
            [
                'Title' => 'Sigma Chi Derby Days',
                'Description' => 'Wordpress Site built for the Sigma Chi Fraternity to use for fundraising.',
                'Link' => 'https://sigmachiderbydays.com/',
                'Image' => '/img/derbydays.png'
            ],
            [
                'Title' => 'TDD Forum',
                'Description' => 'Forum Built with a full PHPUnit Test suite following TDD Laracasts Tutorials',
                'Link' => '/forum/threads',
                'Image' => '/img/forum.png'
            ],
            [
                'Title' => 'Tailwind CSS Practice',
                'Description' => 'Tailwind Responsive Design Practice from screencasts on tailwindcss.com',
                'Link' => '/tailwind',
                'Image' => '/img/tailwind.png'
            ],
            [
                'Title' => 'Zootah, not the zoo you knew',
                'Description' => 'Wordpress Site built in Systems Development Life Cycle Class (MIS 5900)',
                'Link' => 'https://zootah.org/',
                'Image' => '/img/zootah.png'
            ],

        ];
    }
}
