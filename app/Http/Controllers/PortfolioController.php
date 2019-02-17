<?php namespace falkzach\portfolio\Http\Controllers;

use falkzach\portfolio\Project\ProjectRepository;
use falkzach\portfolio\Project\SAITProjectRepository;

class PortfolioController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var SAITProjectRespoisotry
     */
    private $saitRepository;

    public function __construct(ProjectRepository $projectRepository, SAITProjectRepository $saitRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->saitRepository = $saitRepository;
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
                "Seeking a position as a Software Engineer"
            ],
            'banners' => [
                (object) ['src'=>asset("img/canyon_creek_pano.jpg"), 'src_small'=>asset("img/outdoors/backpacking_canyon_creek.jpg"),'alt'=>"Canyon Creek, panoramic views of an alpine lake and surrounding peaks"]
            ]
        ];
        return view('index', $data);
    }

    public function saitProjects()
    {
        $data = $this->saitRepository->getAll();
        return view('sait_projects', $data);
    }

    public function projects()
    {
        $data = $this->projectRepository->getAll();
        return view('projects', $data);
    }

    public function cv() {
        $guiding =
            <<<EOF
In addition to serving the Computer Science Department as a Teaching Assistant, I was also lucky enough to get to serve the University of Montana Campus by working as a climbing guide and instructor for the <a href="http://www.umt.edu/crec/Outdoor" target="_blank">Outdoor Program</a>.
It was in this capacity that I have been able to share my love of outdoor recreation with other students. In my time here, I have introduced many students to the world of climbing, guided climbing, summits, backpacking trips, and even whitewater rafting.
My time with the Outdoor Program was instrumental in my personal and professional development and highlights the unique opportunities that exist at the University of Montana.
EOF;

        $reflections =
            <<<EOF
When finishing my undergrad at the University of Montana, I had applied to the graduate program. While I was accepted into the program, I hadn't secured funding as competition for Teaching Assistantships was high, so I hadn't enrolled in classes and didn't plan on attending. After graduation I hopped on a plane to Southern California and spent 3 weeks climbing. I came back, worked my Software Development Job at the University for the last couple months, put out some job apps, but hadn't found a full-time gig yet. A week before school Professor Joel Henry reached out to me and had a last-minute  TA position for me where another student had flaked. I guess I was going to grad school.

I began my first semester of graduate school in the fall of 2016 and it was trying. I had some sudden health problems and underwent a minor surgery to have a sizable benign mass removed from my back. This combined with the equally poor health of a peer resulted in lagged research in a Computational Biology Class; I dropped it to salvage my other classes. First semester in and I'm behind, damn. I did however keep up on my TA duties for Dr. Henry, grading the ethics papers I once dreaded writing.

The following spring semester I TAed the Design and Analysis of Algorithms course for Dr. Travis Wheeler. My duties for this course were intensive. TAing for this class forced me to solidify my understanding of the field to be an effective resource for my students. It was of the utmost importance that I be available to my students as Dr. Wheeler was orchestrating multiple candidate searches during this semester. Despite all this the semester went quite well and finished with excellent marks. I build a Machine Learning tool with friend and colleague David Blasen, took a seminar course exploring Deep Learning, and explored integration techniques for modeling physics in Dr. Jesse Johnson's Simulation and Modeling class. Take that first semester I'm back! The work on miniML lead to working on Machine Learning research for the NTSG and improving the interface of miniML. While a stressful few months, I delivered a robust search to optimize features and parameters for both classical Machine learning models as well as Tensorflow Neural Networks for quantified landsat data.

In the fall of 2017 I began working for the University of Montana Outdoor Program as a Climbing Instructor and Guide. While rock climbing isn't exactly CS related, I feel that maintaining a work life balance is critical to success and working for the ODP, I have the opportunity to share my love for the outdoors with others. It was also this fall that I studied software optimization in C++11 under Dr. Oliver Serang where I developed a true appreciate for the intricacies of the g++ compiler. I also built a Strava Logger (Bike Thing) from a microcontroler and learned some OpenGL. I returned to grading ethics papers this semester, this time for Dr. William Knight. My role was similar to the last time, but I also took great effort to help ensure the ethics class lived up to Dr. Henry's class. I also had the privilege of guiding an awesome group of students on a backpacking trip in Capitol Reef National Park over spring break for the Outdoor Program.

We're in the home stretch here. Entering the program my graduation track was unclear. I'd hoped that the NTSG research could have been the project I graduated on, but it didn't work out that way. Luckily in the back of my head I'd always maintained a full course load knowing I could graduate on this portfolio. Still grading ethics, I'm getting pretty good at these papers and that's where the department needed me. Wish it were algorithms again again. Time to get on with graduation though; had I not dropped comp bio this would be the last semester. I finally got to take a formal Machine Learning class, after many years studying the subject. I studied game physics and built a game in Unity (Another Adventure Game). Pretty cool semester, I'm almost done.

I had to stick around another semester in the fall, I needed one class and I was going to repeat comp bio, fix that mark on my transcript. So, what to do in Missoula for the summer; why not learn to Guide Whitewater Rafting? I was still working for the Outdoor Program and they gave me the chance. So that was my summer: work, raft, work, raft. My first day on the river I 2 paddled massive flood stage wave trains where the rapids were washed out. I was hooked. By the end of the summer I was running friends down the Alberton Gorge and feeling confident on the river.

The final semester. Turns out I must take a second course or else financial aid wants money now. I can play that game, so in addition to repeating Computational Biology I did an independent study of Compilers. I wrote a wicked fast fragment assembler and learned Flex and Bison to build a C++ and most of a straight to x86_64 compiler (I'll eventually fix it). I had some extra free time this semester since I wasn't TAing, and with my recent love for whitewater I learned to kayak this fall too!

Looking back is strange. To be honest I've been putting it off but now that I've retrospected the last couple years a little bit, looking back it was great! I took many interesting courses, studied under great professors and with talented peers, and feel that I had a positive impact on the academic experience of my students. It didn't necessarily feel this way during school. I was stressed, semesters are never long enough, and there were some courses I was much less stoked on. But it was good. I am excited for what is next, whether that is staying in the lovely Missoula Montana or going to a larger city elsewhere. But I'm excited to hit industry, to solve new and challenging problems.
EOF;
        $course_id=0;
        $data = [
            'degrees' => (object) [
                (object) [
                    'name' => 'Master’s of Science in Computer Science',
                    'year' => '2018',
                    'gpa' => '3.7',
                    'institution' => 'University of Montana',
                    'courses' => [
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI444',
                            'name' => 'Data Visualization',
                            'semester' => 'Autumn 2016',
                            'grade' => 'A',
                            'tags' => ['data science',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI595',
                            'name' => 'ST: Advanced Client-Side Web Programming',
                            'semester' => 'Autumn 2016',
                            'grade' => 'B+',
                            'tags' => ['web',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI477',
                            'name' => 'Simulation and Modeling',
                            'semester' => 'Spring 2017',
                            'grade' => 'A-',
                            'tags' => ['simulation', 'physics',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI564',
                            'name' => 'Applications of Mining Big Data',
                            'semester' => 'Spring 2017',
                            'grade' => 'A',
                            'tags' => ['data science',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI595',
                            'name' => 'ST: Deep Learning',
                            'semester' => 'Spring 2017',
                            'grade' => 'A',
                            'tags' => ['data science',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI441',
                            'name' => 'Computer Graphics Programming',
                            'semester' => 'Autumn 2017',
                            'grade' => 'B',
                            'tags' => ['games',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI595',
                            'name' => 'ST: Internet of Things',
                            'semester' => 'Autumn 2017',
                            'grade' => 'A',
                            'tags' => ['embedded machines',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI595',
                            'name' => 'ST: Software Optimization',
                            'semester' => 'Autumn 2017',
                            'grade' => 'A-',
                            'tags' => ['optimization',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI412',
                            'name' => 'Game and Mobile App Development',
                            'semester' => 'Spring 2018',
                            'grade' => 'A-',
                            'tags' => ['games','mobile'],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI412',
                            'name' => 'Machine Learning',
                            'semester' => 'Spring 2018',
                            'grade' => 'B+',
                            'tags' => ['data science'],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI595',
                            'name' => 'ST: Game Physics Engines',
                            'semester' => 'Spring 2018',
                            'grade' => 'A-',
                            'tags' => ['games', 'physics', 'simulation',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI558',
                            'name' => 'Introduction to Bioinformatics',
                            'semester' => 'Autumn 2018',
                            'grade' => 'B+',
                            'tags' => ['computation biology',],
                        ],
                        (object) [
                            'id' => ++$course_id,
                            'course' => 'CSCI592',
                            'name' => 'Independent Study: Introduction to Compilers',
                            'semester' => 'Autumn 2018',
                            'grade' => 'A',
                            'tags' => ['compilers',],
                        ],
                    ],
                ],
                (object) ['name' => 'Bachelor’s of Science in Computer Science', 'year' => '2016', 'gpa' => '3.4', 'institution' => 'University of Montana',],
            ],
            'research' => (object) [
                'headline' => 'In addition to my Teaching I contributed to a couple of research projects during my time at the University of Montana, primarily as a developer and consultant.',
                'projects' => [
                    (object) ['name' => 'FS Air Quality Monitoring', 'description' => 'I am presently engaged in some light consulting with the Forest Service in order to model air quality from a variety of distributed data collection networks. My work here is limited to providing expertise on implementation of data processing and modeling pipelines in exchange for frosty beverages.'],
                    (object) ['name' => 'NTSG Landsat Ground-cover Classification', 'description' => 'In the Summer of 2017 I worked to develop a Random Feature and Parameter search for both classical Random Forest models as well as a TensorFlow Deep Neural Networks for the NTSG with the goal of producing more accurate land coverage maps based on satellite data. I delivered the search tool as well as some preliminary feature and parameter best first search results.'],
                    (object) ['name' => 'miniML', 'description' => 'miniML was a research project I worked on with fellow grad student David Blasen under the directive of Dr. Rob Smith. The objective was to create a machine learning GUI utility built over Weka to find optimal features with the constraint of limiting runtime.'],
                ],
            ],
            'teaching' => (object) [
                'headline' => 'For four of the five semester of my graduate studies I had the privilege of serving the Computer Science Department as a Teaching Assistant. While my role would vary based on course and instructor, I like to believe that I was an asset to my students. I strive to maintain a welcoming, open office environment and to maintain high availability to my students.',
                'courses' => [
                    (object) ['name' => 'CSCI 315E - Computers, Ethics, and Society', 'instructor' => 'Dr. Joel Henry', 'semester' => 'Autumn 2017', 'description' => 'This course explores the ethical problems that computer scientists face; The codes of ethics of professional computing societies; the social implications of computers, computing, and other digital technologies. The course also serves as the department’s upper division writing course. My role was primarily to grade and provide feedback on student’s papers though I did cover a couple of lectures while Dr. Henry was traveling.'],
                    (object) ['name' => 'CSCI 426 - Advanced Programming Theory and Practice', 'instructor' => 'Dr. Joel Henry', 'semester' => 'Autumn 2017', 'description' => 'This course, at the time, explored advanced software engineering principals, in particular design patters, their use and implementation, and software complexity. My role was primarily bookkeeping and too act as an additional resource when students needed help. Again, I covered lecture sections while Dr. Henry was away.'],
                    (object) ['name' => 'CSCI 442 - Design and Analysis of Algorithms', 'instructor' => 'Dr. Travis Wheeler', 'semester' => 'Spring 2017', 'description' => 'Grading algorithms for Dr. Travis Wheeler was the single most difficult undertaking during my time at the UM. Grading for an algorithms course is nothing like taking an algorithms course. I was responsible for attending class, completing homework to produce answer keys (to be reviewed with Dr. Wheeler), maintaining office hours for students, and the grading of assignments. My work for this course forced me to develop a much deeper understanding and appreciation for algorithmic design and analysis.'],
                    (object) ['name' => 'CSCI 480/580 - Parallel Computing', 'instructor' => 'Dr. Travis Wheeler', 'semester' => 'Spring 2017', 'description' => 'My role in this course was simple. Attend class, stay current on the course material, and act as an additional reference to students both in understanding the material and implementing parallel algorithms for homework.'],
                    (object) ['name' => 'CSCI 315E - Computers, Ethics, and Society', 'instructor' => 'Dr. William Knight', 'semester' => 'Autumn 2017, Spring 2018', 'description' => 'My last two semesters as a TA I worked again on the ethics course, this time however for income instructor William Knight. My roles were similar to before, primarily grading papers, providing feedback to students, and holding office hours. However, I was also a resource to Dr. Knight enabling him to effectively run the course to the previous high standards of Dr. Henry.'],
                ],
            ],
            'guiding' => $guiding,
            'others' => (object) [
                (object) ['name' => 'US Forest Service Wilderness Practitioners Toolboxes', 'description' => 'During my final semester at the University of Montana, I was referred some work for the US Forest Service migrating their <a href="https://www.wilderness.net/index.cfm?fuse=toolboxes" target="_blank">collection of Wilderness Practitioner Toolboxes</a> to the Universities Cascade CMS in order to align with federal accessibility requirements as per WCAG2.0 and in accordance with the university’s agreement with the US Department of Education. While I’d originally hoped to be building a new web tool, it was more practical to build it out as static content in the CMS.'],
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
