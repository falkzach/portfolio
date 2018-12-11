<?php namespace falkzach\portfolio\Http\Controllers;

use falkzach\portfolio\Models\Project;
use falkzach\portfolio\Project\ProjectRepository;

class PortfolioController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct()
    {
//        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $data = [
            'name' => config('portfolio.name'),
            'handle' => config('portfolio.handle'),
            'socialLinks' => [
                'Gmail' => [
                    'url'=>'mailto:'.config('portfolio.email'),//TODO: consider removing mailto link, email form?
                    'class'=>'google'
                ],
                'GitHub' => [
                    'url'=>config('portfolio.githubUrl'),
                    'class'=>'github btn-secondary'
                ],
                'LinkedIn' => [
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
        $id = 0;
        $data = [
            'projects' => [
                (object) [
                    'id' => ++$id,
                    'name' => 'miniML',
                    'assignment' => '',
                    'description' => 'asdb<br/>multilinesetc<br/>adhjfasdkjfhasjkd',
                    'links' =>  [
                        (object) ['url' => 'https://github.com/optimusmoose/miniML', 'class' => 'github',]
                    ]
                ],
                (object) [
                    'id' => ++$id,
                    'name' => 'Bike Thing',
                    'assignment' => '',
                    'description' => '',
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/um-iot/IoT-bike-thing', 'class' => 'github',]
                    ],
                ],
                (object) [
                    'id' => ++$id,
                    'name' => 'Fairly Fast Fragment Assembly Program',
                    'assignment' => '',
                    'description' => '',
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach/CSCI558-Computational-Biology/blob/master/Grad_Challenge_1/assemble.cpp','class' => 'github',],
                    ],
                ],
                (object) [
                    'id' => ++$id,
                    'name' => 'Software Optimization Projects',
                    'assignment' => '',
                    'description' => '',
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach/CSCI595-Software-Optimization', 'class' => 'github',],
                    ],
                ],
                (object) [
                    'id' => ++$id,
                    'name' => 'Simulation Modeling Assignments',
                    'assignment' => '',
                    'description' => '',
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach/CSCI557-Simulation-Modeling', 'class' => 'github',],
                    ],
                ],
                (object) [
                    'id' => ++$id,
                    'name' => 'Another Adventure Game',
                    'assignment' => '',
                    'description' => '',
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/um-game/Another-Adventure-Game', 'class' => 'github',],
                    ]
                ],
                (object) [
                    'id' => ++$id,
                    'name' => 'Introduction to Compilers',
                    'assignment' => '',
                    'description' => '',
                    'links' => (object) [
                        (object) ['url' => 'https://bitbucket.org/orserang/intro-compiler-design', 'class' => 'bitbucket',],
                    ],
                ]
            ]
        ];

        return view('projects', $data);
//        $data= [
//                'SAIT_APPS' => [
////                'Food Zoo Menu',
////                'Student Hiring',
////                'Bus Tracker',
////                'Girz Card Photos',
////                'Scheduled Email',
////                'Campus Hours',
////                'Directory API',
////                'Comment and Attachment API',
////                'UM Mobile App'
////                //legacy
////                'DCO Home',//keep
////                'Email Queue',
////                'Merchant Map',//keep
////                'Hall Snacks',
////                'Bear Hugs',
////                'Game Room Table Timers',
////                'RLO Discipline Database',
////                'RLO Duty Log',
////                'Renter Center Housing',
////                'Renter Center Landlord Review',
//                ]
//        ];

    }

    public function hobbies()
    {
        return $this->index();
    }

    public function contact()
    {
        return $this->index();
    }
}
