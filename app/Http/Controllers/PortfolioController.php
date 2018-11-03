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
                "Bachelor of Computer Science, University of Montana ",
                "Seeking a position as a Software Developer, Somewhere Awesome"
            ]
        ];
        return view('index', $data);
    }

    public function projects()
    {
        return $this->index();
//        $data= [
//            'projects' => $this->projectRepository->getOriginal(),
//                [
////                'Food Zoo Menu',
////                'Student Hiring',
////                'Bus Tracker',
////                'Girz Card Photos',
////                'Scheduled Email',
////                'Campus Hours',
////                'Directory API',
////                'Comment and Attachment API',
////                'UM Mobile App'
//            ],
//            'legacyProjects' => $this->projectRepository->getLegacy()
//                [
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
//            ]
//        ];
//        return view('projects', $data);
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
