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
                'skill' => 'SQL (MySQL, Oracle, Sequel)',
                'experience' => '4 Years',
                'img' => 'https://brandslogos.com/wp-content/uploads/images/large/mysql-logo-1.png',
                'link' => 'https://www.mysql.com/'
            ],
            [
                'skill' => 'PHP 5.6-8.0',
                'experience' => '3 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/php-2038871-1720084.png',
                'link' => 'https://www.php.net/'
            ],
            [
                'skill' => 'Laravel',
                'experience' => '3 Years',
                'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png',
                'link' => 'https://laravel.com/'
            ],
            [
                'skill' => 'HTML',
                'experience' => '3 Years',
                'img' => 'https://images.vexels.com/media/users/3/166383/isolated/preview/6024bc5746d7436c727825dc4fc23c22-html-programming-language-icon-by-vexels.png',
                'link' => 'https://www.w3schools.com/'
            ],
            [
                'skill' => 'CSS',
                'experience' => '3 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/css3-8-1175200.png',
                'link' => 'https://www.w3schools.com/'
            ],
            [
                'skill' => 'Javascript',
                'experience' => '3 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-256/javascript-2038874-1720087.png',
                'link' => 'https://www.w3schools.com/js/js_2018.asp'
            ],
            [
                'skill' => 'jQuery',
                'experience' => '3 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/jquery-10-1175155.png',
                'link' => 'https://jquery.com/'
            ],
            [
                'skill' => 'Composer',
                'experience' => '3 Years',
                'img' => 'https://camo.githubusercontent.com/fae4c4781b893f7229d68c9047a805e9a1dced12e13b466fe40ffd89f0eb6e52/687474703a2f2f676574636f6d706f7365722e6f72672f696d672f6c6f676f2d636f6d706f7365722d7472616e73706172656e742e706e67',
                'link' => 'https://getcomposer.org/'
            ],
            [
                'skill' => 'AWS',
                'experience' => '3 Years',
                'img' => 'https://img.icons8.com/color/452/amazon-web-services.png',
                'link' => 'https://aws.amazon.com/'
            ],
            [
                'skill' => 'Github',
                'experience' => '3 Years',
                'img' => 'https://image.flaticon.com/icons/png/512/25/25231.png',
                'link' => 'https://github.com/blakelthaus'
            ],
            [
                'skill' => 'Apache Servers',
                'experience' => '2 Years',
                'img' => 'https://d22e4d61ky6061.cloudfront.net/sites/default/files/Apache%20HHTP%20Server.png',
                'link' => 'https://httpd.apache.org/'
            ],
            [
                'skill' => 'Ngnix Servers',
                'experience' => '2 Year',
                'img' => 'https://img.icons8.com/color/452/nginx.png',
                'link' => 'https://www.nginx.com/'
            ],
            [
                'skill' => 'Angular',
                'experience' => '2 Years',
                'img' => 'https://angular.io/assets/images/logos/angular/angular.png',
                'link' => 'https://angular.io/'
            ],
            [
                'skill' => 'Wordpress',
                'experience' => '2 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/wordpress-35-569289.png',
                'link' => 'https://wordpress.com/'
            ],
            [
                'skill' => 'Code Igniter',
                'experience' => '2 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/codeigniter-4-1175201.png',
                'link' => 'https://codeigniter.com/'
            ],
            [
                'skill' => 'Bitbucket',
                'experience' => '2 Years',
                'img' => 'https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/44_Bitbucket_logo_logos-512.png',
                'link' => 'https://bitbucket.org/'
            ],
            [
                'skill' => 'Beanstalk',
                'experience' => '2 Years',
                'img' => 'https://numediaweb.com/wordpress/wp-content/uploads/2014/05/beanstalk-logo-trans.png',
                'link' => ''
            ],
            [
                'skill' => 'Vagrant VM',
                'experience' => '2 Years',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/vagrant-226063.png',
                'link' => 'https://beanstalkapp.com/'
            ],
            [
                'skill' => 'Homebrew',
                'experience' => '2 Years',
                'img' => 'https://icons-for-free.com/iconfiles/png/512/homebrew-1324440174216266294.png',
                'link' => 'https://brew.sh/'
            ],
            [
                'skill' => 'Python',
                'experience' => '1 Year',
                'img' => 'https://cdn3.iconfinder.com/data/icons/logos-and-brands-adobe/512/267_Python-512.png',
                'link' => 'https://www.python.org/'
            ],
            [
                'skill' => 'Squarespace Developer Platform',
                'experience' => '1 year',
                'img' => 'https://cdn.iconscout.com/icon/free/png-512/squarespace-3-739563.png',
                'link' => 'https://support.squarespace.com/hc/en-us'
            ],
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
                'description' => 'Owned codebase for 300+ tire/auto eccomerce and appointment scheduling websites built using a combination of Laravel, Codeigniter, and Angular. Webtires.net is one example of many.'
            ],
        ];
    }
}
