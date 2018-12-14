<?php namespace falkzach\portfolio\Http\Controllers;

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
                "Master's of Science in Computer Science",
                "University of Montana, 2018",
                "Seeking a position as a Software Developer"
            ],
            'banners' => [
                (object) ['src'=>asset("img/canyon_creek_pano.jpg"),'alt'=>"Canyon Creek, panoramic of an alpine lake and surrounding peaks"]
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
        $data = [
            'degrees' => (object) [
                (object) ['name' => 'Bachelor\'s of Science in Computer Science', 'year' => '2016', 'institution' => 'University of Montana',],
                (object) ['name' => 'Master\'s of Science in Computer Science', 'year' => '2018', 'institution' => 'University of Montana'],
            ],
            'research' => (object) [
                'headline' => '',
                'projects' => [
                    (object) ['name' => 'FS Air Quality Monitoring', 'description' => "Currently doing some pro-bono consulting to assist the Forest Service Model Air Quality Data"],
                    (object) ['name' => 'NTSG Landsat Ground-cover Classification', 'description' => ""],
                    (object) ['name' => 'miniML', 'description' => ""],
                ],
            ],
            'teaching' => (object) [
                'headline' => 'Fou four of the five semester of my graduate studies I had the privilege of serving the Computer Science Department as a Teaching Assistant.  ',
                'courses' => [
                    (object) ['name' => 'CSCI 315E - Computers, Ethics, and Society', 'instructor' => 'Dr. Joel Henry', 'semester' => 'Autumn 2017', 'description' => 'Ethical problems that computer scientists face. The codes of ethics of professional computing societies. The social implications of computers, computing, and other digital technologies.'],
                    (object) ['name' => 'CSCI 426 - Advanced Programming Theory and Practice', 'instructor' => 'Dr. Joel Henry', 'semester' => 'Autumn 2017', 'description' => ''],
                    (object) ['name' => 'CSCI 442 - Design and Analysis of Algorithms', 'instructor' => 'Dr. Travis Wheeler', 'semester' => 'Spring 2017', 'description' => ''],
                    (object) ['name' => 'CSCI 480/580 - Parallel Computing', 'instructor' => 'Dr. Travis Wheeler', 'semester' => 'Spring 2017', 'description' => ''],
                    (object) ['name' => 'CSCI 315E - Computers, Ethics, and Society', 'instructor' => 'Dr. William Knight', 'semester' => 'Autumn 2017, Spring 2018', 'description' => ''],
                ],
            ],
            'guiding' => "",
            'other' => (object) [

            ],
            'reflections' => "",


        ];
        return view('cv', $data);
    }

    public function outdoors()
    {
        $description =
<<<EOF
I like to spend my free time in the outdoors and partake in many outdoor recreational activates including Climbing, Mountain Biking, Whitewater Rafting, Backpacking and this fall even learned to Kayak. 
Sometimes I have the privilege of sharing my passion for the outdoors with others through guiding. During my time attending Graduate School at the University of Montana, I've enjoyed working for the <a href="https://www.umt.edu/crec/Outdoor" target="_blank">Outdoor Program</a>, one of the unique features of our campus.
I currently hold an <a href="https://amga.com/" target="_blank">AMGA</a> Climbing Wall Instructor Lead Certification and hold a current Wilderness First Responder Certification from <a href="https://aeriemedicine.com" target="_blank">AEIRE Backcountry Medicine</a>. I intent to peruse the level of Single Pitch Instructor and beyond.  
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
