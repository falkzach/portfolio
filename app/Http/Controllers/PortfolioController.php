<?php namespace falkzach\portfolio\Http\Controllers;

class PortfolioController extends Controller
{
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
//        $data= [
//            'projects' => [
//                'Food Zoo Menu',
//                'Student Hiring',
//                'Bus Tracker',
//                'Girz Card Photos',
//                'Scheduled Email',
//                'Campus Hours',
//                'Directory API',
//                'Comment and Attachment API',
//                'UM Mobile App'
//            ],
//            'legacyProjects' => [
//                'DCO Home',//keep
//                'Email Queue',
//                'Merchant Map',//keep
//                'Hall Snacks',
//                'Bear Hugs',
//                'Game Room Table Timers',
//                'RLO Discipline Database',
//                'RLO Duty Log',
//                'Renter Center Housing',
//                'Renter Center Landlord Review',
//            ]
//        ];
    }
}
