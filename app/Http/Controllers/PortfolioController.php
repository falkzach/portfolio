<?php namespace App\Http\Controllers;

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
}
