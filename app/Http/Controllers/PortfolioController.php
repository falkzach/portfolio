<?php namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Zachary Falkner',
            'handle' => 'falkzach',
            'socialLinks' => [
                'Gmail' => [
                    'url'=>'mailto:falkzach+portfolio@gmail.com',
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
                "Seeking a position as a Software Developer"
            ]
        ];
        return view('index', $data);
    }
}
