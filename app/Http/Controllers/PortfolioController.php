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
                    'url'=>'mailto:falkzach+portfolio@gmail.com',//TODO: consider removing mailto link, email form?
                    'class'=>'google'
                ],
                'GitHub' => [
                    'url'=>'https://github.com/falkzach',
                    'class'=>'github btn-secondary'
                ],
                'LinkedIn' => [
                    'url'=>'https://www.linkedin.com/in/zachary-falkner-a70508a',
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
