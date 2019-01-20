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
        $guiding =
            <<<EOF
In addition to serving the Computer Science Department as a Teaching Assistant, I was also lucky enough to get to serve the University of Montana Campus by working as a climbing guide and instructor for the <a href="http://www.umt.edu/crec/Outdoor" target="_blank">Outdoor Program.</a>
It was in this capacity that I have been able to share my love of outdoor recreation with other students. In my time here I have introduced many students to the world of climbing, guided climbing, summits, backpacking trips, and even whitewater rafting.
My time with the Outdoor Program was instrumental in my personal and professional development and highlights the uniqu opertunities that exist at the University of Montana.

EOF;

        $reflections =
            <<<EOF
When finishing my undergrad at the University of Montana, I had applied to the graduate program. While I was accepted into the program, I hadn't secured funding as competition for Teaching Assistantships was high so I hadn't enrolled in classes and didn't plan on attending. After graduation I hopped on a plane to Southern California and spent 3 weeks climbing. I came back, worked my Software Development Job at the University for the last couple months, put out some job apps, but hadn't found a full time gig yet. A week before school Professor Joel Henry reached out to me and had a last minuit TA position for me where another student had flaked. I guess I was going to grad school.

The first semester was trying, I had some health problems and underwent a minor surgery to have a sizable benign mass removed from my back. This was a setback to progress on the research portion of Dr. Travis Wheeler's Computational Biology Class; I dropped it to salvage my other classes. First semester in and I'm behind, damn.

After that things smoothed out a bit and my second semester went quite well with excellent marks. I build a Machine Learning tool with friend and colleague David Blasen and took a seminar style class exploring Deep Learning.

I spent the following summer working on Machine Learning research for the NTSG and improving the interface of miniML. While a stressful few months, I delivered a robust search to optimize features and parameters for both classical Machine learning models as well as Tensorflow Neural Networks for quantified landsat data; Neat.

That fall I began working for the University of Montana Outdoor Program as a Climbing Instructor and Guide.
EOF;

        $data = [
            'degrees' => (object) [
                (object) ['name' => 'Bachelor\'s of Science in Computer Science', 'year' => '2016', 'institution' => 'University of Montana',],
                (object) ['name' => 'Master\'s of Science in Computer Science', 'year' => '2018', 'institution' => 'University of Montana'],
            ],
            'research' => (object) [
                'headline' => 'In addition to my Teaching, I also contributed to a couple of research projects, primarily as a developer.',
                'projects' => [
                    (object) ['name' => 'FS Air Quality Monitoring', 'description' => 'I am presently engaged in some light consulting with the Forest Service in order to model air quality from a variety of distributed data collection networks. My work here islimited to providing expertiece on implementation of data processing and modeling pipelines in exchange for frosty beverages.'],
                    (object) ['name' => 'NTSG Landsat Ground-cover Classification', 'description' => '...'],
                    (object) ['name' => 'miniML', 'description' => 'miniML was a research project I worked on with fellow grad student David Blasen under the directive of Dr. Rob Smith. The objective was to create a machine learning GUI utility built over weka to find optimal features and parameters with the constraint of limiting runtime.'],
                ],
            ],
            'teaching' => (object) [
                'headline' => 'For four of the five semester of my graduate studies I had the privilege of serving the Computer Science Department as a Teaching Assistant. While my role would varry based on course and instructor, I like to beleive that I was an asset to my students. While office hours were scheduled regularly, I strived to maintain a welcoming, open door environment.',
                'courses' => [
                    (object) ['name' => 'CSCI 315E - Computers, Ethics, and Society', 'instructor' => 'Dr. Joel Henry', 'semester' => 'Autumn 2017', 'description' => 'This course explores the ethical problems that computer scientists face; The codes of ethics of professional computing societies; the social implications of computers, computing, and other digital technologies. The course also serves as the departments upper division writing course. My role was primarily to grade and provide feedback on students papers though I did cover a couple of lectures while Dr. Henry was traveling.'],
                    (object) ['name' => 'CSCI 426 - Advanced Programming Theory and Practice', 'instructor' => 'Dr. Joel Henry', 'semester' => 'Autumn 2017', 'description' => 'This course, at the time, explored advanced software engineering principals, in particular deisgn patters, their use and implementation, and software complexity. My role was primarily bookkeeping and too act as an additional resource when students needed help. Again I covered lecture sections while Dr. Henry was away.'],
                    (object) ['name' => 'CSCI 442 - Design and Analysis of Algorithms', 'instructor' => 'Dr. Travis Wheeler', 'semester' => 'Spring 2017', 'description' => 'Grading algorithms for Dr. Travis Wheeler was the single most difficult undertaking durning my time at the UM. Grading for an algorithms course is nothing like taking an algorithms course. I was responsible for attening class, completing homework to produce anser keys (to be reviewd with Dr. Wheeler), maintaining office hours for students, and the grading of assignments. My work for this course forced me to develop a much deeper understanding and appriciation for algorithmic design and analysis.'],
                    (object) ['name' => 'CSCI 480/580 - Parallel Computing', 'instructor' => 'Dr. Travis Wheeler', 'semester' => 'Spring 2017', 'description' => 'My role in this course was simple. Attend class, stay current on the course material, and act as an additional reference to students both in understanding the material and implementing paraellel algorithms for homework.'],
                    (object) ['name' => 'CSCI 315E - Computers, Ethics, and Society', 'instructor' => 'Dr. William Knight', 'semester' => 'Autumn 2017, Spring 2018', 'description' => 'My last two semesters as a TA I worked again on the ethics course, this time however for income instructor William Knight. My roles were similar to before, primarily grading papers, providing feedback to students,  and holding office hours. However I was also a resource to Dr. Knight enabling him to effectly run the course to the previous high standards of Dr. Henry.'],
                ],
            ],
            'guiding' => $guiding,
            'others' => (object) [
                (object) ['name' => 'US Forest Service Wilderness Practitioners Toolboxes', 'description' => 'During my final semester here, I worked for the US Forest Service in order to migrate their <a href="https://www.wilderness.net/index.cfm?fuse=toolboxes" target="_blank">collection of toolboxes</a> to the Universities Casecade CMS in order to align with federal accessability requirements as dictated by the ADA and Title9.'],
            ],
            'reflections' => $reflections,


        ];
        return view('cv', $data);
    }

    public function outdoors()
    {
        $description =
<<<EOF
I like to spend my free time in the outdoors and partake in many outdoor recreational activates including Climbing, Mountain Biking, Whitewater Rafting, Backpacking and this fall even learned to Kayak. 
Sometimes I have the privilege of sharing my passion for the outdoors with others through guiding. During my time attending Graduate School at the University of Montana, I've enjoyed working for the <a href="https://www.umt.edu/crec/Outdoor" target="_blank">Outdoor Program</a>, one of the unique features of our campus.
I currently hold an <a href="https://amga.com/" target="_blank">AMGA</a> Climbing Wall Instructor Lead Certification and hold a current Wilderness First Responder Certification from <a href="https://aeriemedicine.com" target="_blank">AEIRE Backcountry Medicine</a>. I intent to peruse the AMGA Single Pitch Instructor and Wilderness EMT certifications.  
EOF;

        $id = 0;
        $data = [
            'outdoors' => (object) [
                'description' => $description,
            ],

            'images' => [
                (object) ['key' => $id++, 'src' => 'img/outdoors/backpacking_bass_creek.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/backpacking_canyon_creek.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/backpacking_kootenia.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/boating_havasu.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/chasing_ice_missions.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/climbing_holcomb_valley_pinnacles.jpg', 'alt' => 'Climbing at Holcomb Valley Pinnacles'],
                (object) ['key' => $id++, 'src' => 'img/outdoors/guiding_backpacking_capitol_reef.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/guiding_climbing_kootenia.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/guiding_hiking_ch-paa-qn.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/guiding_hiking_ch-paa-qn_1.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/guiding_rafting_blackfoot.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/ice_climbing.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/mtb_kreis_pond.jpg', 'alt' => ''],
                (object) ['key' => $id++, 'src' => 'img/outdoors/xc-skiing_lolo_pass.jpg', 'alt' => ''],
            ],
        ];
        shuffle($data['images']);
        return view('outdoors', $data);
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
