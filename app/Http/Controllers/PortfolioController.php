<?php namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Zachary Falkner',
            'handle' => 'falkzach',
            'links' => [
                'Gmail' => [
                    'url'=>'mailto:falkzach+portfolio@gmail.com',
                    'class'=>'google'
                ],
                'github' => [
                    'url'=>'https://github.com/falkzach',
                    'class'=>'github'
                ],
                'LinkedIn' => [
                    'url'=>'https://www.linkedin.com/in/zachary-falkner-a70508a',
                    'class'=>'linkedin'
                ],
            ]
        ];
        return view('index', $data);
    }
}
