<?php namespace falkzach\portfolio\Http\Controllers;

use falkzach\portfolio\Models\Project;
use falkzach\portfolio\Project\ProjectRepository;

class PortfolioController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $data = [
            'name' => config('portfolio.name'),
            'handle' => config('portfolio.handle'),
            'socialLinks' => [
                'Gmail' => (object) [
                    'url'=>'mailto:'.config('portfolio.email'),//TODO: consider removing mailto link, email form?
                    'class'=>'google'
                ],
                'GitHub' => (object) [
                    'url'=>config('portfolio.githubUrl'),
                    'class'=>'github btn-secondary'
                ],
                'LinkedIn' => (object) [
                    'url'=>config('portfolio.linkedinUrl'),
                    'class'=>'linkedin'
                ],
            ],
            'headlines' => [
                "Masters of Computer Science, University of Montana, 2018 ",
                "Seeking a position as a Software Developer"
            ],
            'banners' => [
                ['src'=>asset("img/canyon_creek_pano.jpg"),'alt'=>"Canyon Creek, panoramic of an alpine lake and surrounding peaks"]
            ]
        ];
        return view('index', $data);
    }

    public function projects()
    {
        $data = $this->projectRepository->getAll();
        return view('projects', $data);
    }

    public function cv() {
        $data = [];
        return view('cv', $data);
    }

    public function outdoors()
    {
        $description =
<<<EOF
I like to spend my free time in the outdoors and partake in many outdoor recreational activates including Climbing, Mountain Biking, Whitewater Rafting, Backpacking and this fall even learned to Kayak. 
Sometimes I have the privilege of sharing my passion for the outdoors with others through guiding. During my time attending Graduate School at the University of Montana, I've enjoyed working for the <a href="https://www.umt.edu/crec/Outdoor" target="_blank">Outdoor Program</a>, one of the unique features of our campus.
<br />I currently hold an AMGA Climbing Wall Instructor Lead Certification with the intent of persuing my Single Pitch Instructor Certification. I also hold a current Wilderness First Responder Certification.
EOF;

        $id = 0;
        $data = [
            'outdoors' => (object) [
                'description' => $description,
            ],

            'images' => [
                (object) ['key' => $id++, 'src' => 'img/hobbies/backpacking_bass_creek.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/backpacking_canyon_creek.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/backpacking_kootenia.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/boating_havasu.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/chasing_ice_missions.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/climbing_holcomb_valley_pinnacles.jpg', 'alt' => 'Climbing at Holcomb Valley Pinnacles'],
                (object) ['key' => $id++, 'src' => 'img/hobbies/guiding_backpacking_capitol_reef.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/guiding_climbing_kootenia.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/guiding_hiking_ch-paa-qn.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/guiding_hiking_ch-paa-qn_1.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/guiding_rafting_blackfoot.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/ice_climbing.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/mtb_kreis_pond.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/hobbies/xc-skiing_lolo_pass.jpg', 'alt' => ''],
            ],
        ];
        shuffle($data['images']);
        return view('hobbies', $data);
    }

    public function contact()
    {
        $data = [
            'socialLinks' => [
                'Gmail' => (object) [
                    'url'=>'mailto:'.config('portfolio.email'),//TODO: consider removing mailto link, email form?
                    'class'=>'google'
                ],
                'LinkedIn' => (object) [
                    'url'=>config('portfolio.linkedinUrl'),
                    'class'=>'linkedin'
                ],
            ],
        ];
        return view('contact', $data);
    }
}
