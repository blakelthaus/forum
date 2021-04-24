<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlakeController extends Controller
{
    public function index()
    {
        return view('blake.index');
    }

    public function new()
    {
        $sites = $this->getSites();
        $colors = $this->getRandomColors();
        $skills = $this->getSkills();
        return view('blake.newindex', ['sites' => $sites, 'colors' => $colors, 'skills' => $skills]);
    }

    public function contact()
    {
        return view('blake.contact');
    }

    public function resume()
    {
        return view('blake.resume');
    }

    private function getRandomColors() {
        return [
            'indigo',
            'red',
            'yellow',
            'green',
        ];
    }

    private function getSkills() {
        return [
            [
                'skill' => 'Laravel',
                'experience' => '2-3 Years',
                'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png',
                'link' => 'https://laravel.com/'
            ],
            [
                'skill' => 'SQL (MySQL, Oracle, Sequel)',
                'experience' => '4 Years',
                'img' => 'https://pngimg.com/uploads/mysql/mysql_PNG23.png',
                'link' => 'https://www.mysql.com/'
            ],
            [
                'skill' => 'HTML/CSS',
                'experience' => '3 Years',
                'img' => 'https://i.pinimg.com/originals/52/2e/6b/522e6bc1a11d1726a35f81cbd979395f.jpg',
                'link' => 'https://www.w3schools.com/'
            ],
            [
                'skill' => 'Javascript',
                'experience' => '3 Years',
                'img' => 'https://www.vhv.rs/dpng/d/313-3133777_javascript-transparent-background-svg-hd-png-download.png',
                'link' => 'https://www.w3schools.com/js/js_2018.asp'
            ],
            [
                'skill' => 'jQuery',
                'experience' => '3 Years',
                'img' => 'https://lh3.googleusercontent.com/proxy/et4TjXRMYes_x29QuBpE93QpjsLFc_gNCVrwQ5Vs4Aqno0-nE7RB6BfRh2o0rB_ITY6bzLQvTqPLr3Hi51sTJ_h7VTPKUvfZKnedlxW_Qz0e8a3pUXx5vKw',
                'link' => 'https://jquery.com/'
            ],
            [
                'skill' => 'PHP 5.6-8.0',
                'experience' => '3 Years',
                'img' => 'https://www.php.net/images/logos/new-php-logo.svg',
                'link' => 'https://www.php.net/'
            ],
            // [
            //     'skill' => 'Composer',
            //     'experience' => '2-3 Years',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => 'Apache Servers',
            //     'experience' => '2 Years',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => 'Ngnix Servers',
            //     'experience' => '1 Year',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => 'Angular',
            //     'experience' => '1 Year',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => 'Wordpress',
            //     'experience' => '2 Years',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => '',
            //     'experience' => '',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => '',
            //     'experience' => '',
            //     'img' => '',
            //     'link' => ''
            // ],
            // [
            //     'skill' => '',
            //     'experience' => '',
            //     'img' => '',
            //     'link' => ''
            // ],
            
        ];
    }

    private function getSites() {
        return [
            [
                'title' => 'VegasGoldenKnights.com',
                'img' => '/img/VegasGoldenKnightsWebsite.png',
                'link' => 'https://nhl.com/goldenknights',
                'description' => 'Work with all departments of the VGK business team to manage the site in multiple ways including: daily content, advertising, scheduling, integrations and relations with league technical teams.'
            ],
            [
                'title' => 'HendersonSilverKnights.com',
                'img' => '/img/hsk.png',
                'link' => 'https://hendersonsilverknights.com',
                'description' => 'Participated in vendor selection and serving as project manager/site admin for the ongoing development of the official website for the newest AHL franchise the Henderson Silver Knights.'
            ],
            [
                'title' => 'VGKWorldwide.com',
                'img' => '/img/vgkww.png',
                'link' => 'https://vgkworldwide.com',
                'description' => 'Manage updates and build new features as necessary for this LAMP stack single page application that allows fans to place their marker on the map via Google Cloud Services and AWS.'
            ],
            [
                'title' => 'VegasGoesGold.com',
                'img' => '/img/vegasgoesgold.png',
                'link' => 'https://vegasgoesgold.com',
                'description' => 'Interactive single-page site built with multiple CSS/JS animation methods to unveil the Vegas Golden Knights new gold jerseys for the 2020-21 season.'
            ],
            [
                'title' => 'VGK Youth Hockey and Rink Sites',
                'img' => '/img/vgkrinks.png',
                'link' => 'https://www.vgkrinks.com/',
                'description' => 'Lead redesign efforts for CityNationalArena.com, VegasGoldenKnightsJr.com, and launched LifeguardArena.com in conjunction with Sportengine.'
            ],
            [
                'title' => 'theDollarLoanCenter.com',
                'img' => '/img/dlc.png',
                'link' => 'https://thedollarloancenter.com',
                'description' => 'Temporary site built to unveil the naming rights of the Dollar Loan Center hosted via AWS S3 and CloudFront. Currently working as project manager on long-term site.'
            ],
            [
                'title' => 'TireGuru.net',
                'img' => '/img/tireguru.png',
                'link' => 'https://tireguru.net',
                'description' => 'Worked with a team of developers to build new features and improve performance of the online TireGuru Business Center Auto and Tire shop management system using Classic PHP, Laravel, and Javascript.'
            ],
            [
                'title' => 'WebTires.net',
                'img' => '/img/webtires.png',
                'link' => 'https://webtires.net',
                'description' => 'Owned codebase for 300+ tire/auto eccomerce and appointment scheduling websites built using a combination of Laravel, Codeigniter, and Angular'
            ],
        ];
    }
}
