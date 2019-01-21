<?php namespace falkzach\portfolio\Project;


class ProjectRepository
{
    private $compilers_assignment;
    private $compilers_description;
    private $compilers_snippet;

    private $fffap_assignment;
    private $fffap_description;
    private $fffap_snippet_0;
    private $fffap_snippet_1;
    private $fffap_snippet_2;

    private $adventure_assignment;
    private $adventure_description;

    private $opt_assignment;
    private $opt_description;

    private $bike_thing_assignment;
    private $bike_thing_description;

    private $sim_assignment;
    private $sim_description;

    private $miniML_assignment;
    private $miniML_description;

    private $ml_assignment;
    private $ml_description;

    public function __construct()
    {
        $this->compilers_assignment =
            <<<EOF
This project was an independent study I undertook my final semester at the University of Montana Under the Supervision of <a href='https://alg.cs.umt.edu/index.html' target="_blank">Dr. Oliver Serang</a>.
The objective was to refine a modern compilers curriculum using flex and bison and modern C++. This comprised of five assignments:
<ol class="text-left">
<li>Basic: In order to understand flex, write a basic lexer that can identify integers and alpha-only strings</li>
<li>Grammar: In order to understand bison, write a basic grammar parser with a set of known verbs. On simple sentences, identify the subject and predicate.</li>
<li>Interpreter: Now that the basics of flex and bison are understood, produce a basic interpreter with the following functionality:
<ul><li>Assignments</li><li>Print Statements</li><li>Integer Variables</li><li>Parenthesis</li><li>Multiplication, Division, Addition, Subtraion</li><li>unary minus</li></ul>
</li>
<li>C++ Translator: Improve the interpreter to generate modern compilable C++ code. Change the Integers to floating point decimals.</li>
<li>Assembly Translator: Improve the C++ translator to generate modern x86_64 assembly code that executes; using floats!</li>
</ol> 
EOF;

        $this->compilers_description =
            <<<EOF
Working on this project I learned how to write lexical analyzers using <a href="https://github.com/westes/flex" target="_blank">flex</a> and grammar parsers using <a href="https://github.com/Distrotech/bison" target="_blank">bison</a>.
Moreover I developed an understanding and appriciation for how more complex compilers such as gcc/g++ and interpreters such as python operate and why certain syntactial decisions are made.
I am proud to say that I was able to produce a functioning compiler free of any<a href="https://www.gnu.org/software/bison/manual/html_node/Shift_002fReduce.html" target="_blank">Shift Reduce Conflicts</a>, and am particularly proud of tackling the x86_64 assembly (TODO: it's broken finish it).
If I could do things differently on this project I would: 1. add more functionality and optimizations !here is so much more to learn I have barley scratched the surface. and 2. when working on the assembly translator, gone straight to reverse engineering gcc with -S.
EOF;

        $this->compilers_link_tooltip = "The code for this resides in a repository owned by Dr. Serang. As it is the basis for a course I am not at liberty to share it publicly.";

        $this->compilers_snippet =
            <<<EOF
...
nestedExpression:
    LEFT_PARENTHESIS expression RIGHT_PARENTHESIS { $$ = $2; }
    | atomicExpression {}
    ;

atomicExpression:
    IDENTIFIER {
        if (variables.count($1) != 0) {
            IdentifierNode * node = new IdentifierNode($1, 0);
            $$ = (AtomicNode*) node;
            variables.insert(std::string($1));
        } else {
            std::cout << $1 << std::endl;
            std::cout << "\\033[1;31mNameError: \\033[0mname " << $1 << " is not defined" << std::endl;
            exit(1);
        }
    }
    | FLOAT {
        FloatNode * node = new FloatNode(".LC" + std::to_string(n_vars), 0);
        $$ = (AtomicNode*) node;
        offsets[$1] = n_vars * sizeof(float);
        initial_values[n_vars++] = std::stof($1);
    }
    ;

...
EOF;

        $this->fffap_assignment =
            <<<EOF
This was one of three competition challenge problems presented to the graduate Students by Dr. Oliver Serang as a part of his Introduction to Bioinformatics course (Autumn 2018).
Though I completed an implementation for each of the challenges, I just so happened to win this competition with both the fastest algorithm, but the only algorithm to provide correct reconstruction on large input sets. For this I joined the exclusive shirt club.

<a href="https://alg.cs.umt.edu/lectures.html" target="_blank">From algs.cs.umt.edu/lectures</a>
GRAD CHALLENGE 1 (GENOME ASSEMBLY): Create a program to try to assemble a linear chromosome (a string of 'G', 'A', 'T', and 'C' [uppercase only] using only short reads). Your program must be entirely original and must not use any external libraries (except for numpy in python or the C++ standard library in C++). Your program must consist of a single source file (if using python) or compile from a single source file without any extra compilation flags (if using C++). C++ programs will be compiled with -std=c++11 (and -O3 and -march=native and -fopenmp), so using the C++11 standard is fine. Regardless of language, your program should accept one command line parameter: the name of a text file containing all of the short reads (one short read per line). Your program should output only one thing: the string ('G', 'A', 'T', and 'C' [uppercase only]) that you believe was used to generate the reads (whitespace in your output does not matter); this is your genome assembly. Your submission must run in <10 minutes on <10000 fragments each with length >10bp and <100bp.

Here is the program that will be used to generate short reads: <a href="https://alg.cs.umt.edu/media/comp-bio/make_fragments.py" target="_blank">make_fragments.py</a>
To learn how to use make_fragments.py, run it without arguments.
Calling

python make_fragments.py 'GATTACCAATTACCAGGA' 20 5 10
resulted in output
TTACCA
CCAGGA
ATTACCAATT
TACCAGGA
GATTA
GATTA
CCAGG
ATTAC
CCAGGA
CAATTACC
AATTACCAG
ACCAGGA
TACCAGG
ACCAATTAC
CCAATT
CCAATTA
CCAGGA
ACCAGGA
TACCAG
AATTACCAGG
Your program is supposed to read a file of the above output and try to infer the original string, ``GATTACCAATTACCAGGA''.

The student with the best alignment to my secret, original string will be decided using Needleman-Wunsch with parameters: gap=-4, mismatch=-2, match=1. Y.

If you want to improve your performance when testing, here is a C++ Needleman-Wunsch implementation and a python program to draw a heatmap from your pass-through score matrix (which the C++ program outputs to stdout).
EOF;

        $this->fffap_description =
            <<<EOF
My implementation for this problem generates a graph of directed edges from a node who's suffix is the prefix of the destination node with a weight of the number of overlapping characters.
In addition a metagraph is kept tracking overlap weights to edges.
Those edges are then greedily consumed to construct a hamiltonian path.
Finally the path is walked and a result sequence constructed based on the path and tracked overlaps.
The input size is reduce by eliminating fragments that are pure substrigns of other fragments.

Open MP pragmas are included to signifigantly increase performance on large input sets.

This implementation leans on a few key assumptions
1.) that the fragments provide full coverage of the original sequence
2.) that fragments which are pure substrings of other fragments provide no extra information
     - while this may not be true, leaning on signifigant over coverage (see 1) makes this acceptable
     - working under this assumption, the size of the input set can be signfigently reduce before construction of the graph
3.) that greedy consumption of edges will provide an ideal reconstruction of the sequence

It does alright.
EOF;

        $this->fffap_snippet_0 =
            <<<EOF

fragments:
TTACCA
CCAGGA
ATTACCAATT
TACCAGGA
GATTA
GATTA
CCAGG
ATTAC
CCAGGA
CAATTACC
AATTACCAG
ACCAGGA
TACCAGG
ACCAATTAC
CCAATT
CCAATTA
CCAGGA
ACCAGGA
TACCAG
AATTACCAGG
EOF;

        $this->fffap_snippet_1 =
            <<<EOF

relevent fragments:
ATTACCAATT
TACCAGGA
GATTA
CAATTACC
ACCAATTAC
AATTACCAGG
EOF;

        $this->fffap_snippet_2 =
            <<<EOF

./assemble.o fragments.txt
0:      3(5),   4(7),   5(4),
1:
2:      0(4),
3:      0(6),   4(3),   5(7),   1(4),
4:      3(7),   0(5),   5(6),   1(3),
5:      1(7),
GATTA
 ATTACCAATT
    ACCAATTAC
      CAATTACC
       AATTACCAGG
          TACCAGGA

GATTACCAATTACCAGGA
EOF;

        $this->opt_assignment =
            <<<EOF
The objective of Dr. Oliver Serang's Software Optimization Course is simple. Make things go faster.
Why? Because it's there. Because we can. Because we need to. The same reason we climb mountains.
For this course three optimization problems were presented by Dr. Serang, in the format of a friendly competition.
The rules are simple, matching the reference output is all that matters for the grade, submit the trivial solution. But the fastest implementation takes the custom screen printed shirt...
These problems consisted of the following:
<ol>
<li>Game of Life</li>
<li>Matrix Multiplication</li>
<li>Identifying Short Reads in a Genome</li>
</ol>
In addition several optimizations were demonstrated and evaluated in smaller weekly assignments.
The book for this course is freely available thanks to Dr. Serang: <a href="https://alg.cs.umt.edu/media/serang-code-optimization-in-c++11.pdf" target="_blank">Code Optimizations In C++11</a>
EOF;

        $this->opt_description =
            <<<EOF
While I was not declared victor for any of the three competitions, I was always a top contender. More importantly I became versed in the dark arts of bit twiddling
I found this class to be both incredibly rewarding and challenging and am fond of the friendly competition format. Each assignment forced me push further develop and flex my C++ skills and as a result it has become my favorite language.
EOF;

        $this->adventure_assignment =
            <<<EOF
The assignment for this project was simple. Design and implement a mobile application or game.
This was a group project completed with classmates Kyle Lucke, Adam Clemons, and Cameron Gomke and we elected to build a game using the <a href="https://unity3d.com/" target="_blank">Unity Game Engine</a>.
EOF;

        $this->adventure_description =
            <<<EOF
Another Adventure game is yet another 2d top down roll playing game. A story of keeping up on laundry. Of clean pants and algorithms homework.
It looks like a corny Zelda clone (because we "borrowed" sprites for prototyping) but it actually has some interesting and unique mechanics including procedurally generated random dungeons and synergystic item sets.
I played key roles in UI design, low fidelity mockups, as well as use case analysis and storyboarding.
Implementation the procedurally generated dungeons was my primary coding role on this project. In addition I also implemented some basic start game tutorial functionality.
While only a prototype I find it quite satisfying running about the mazes created by my dungeon generator, complete with randomly placed enemies, obstacles, treasures, egress and ingress.
EOF;

        $this->bike_thing_assignment =
            <<<EOF

EOF;

        $this->bike_thing_description =
            <<<EOF

EOF;

        $this->sim_assignment =
            <<<EOF

EOF;

        $this->sim_description =
            <<<EOF

EOF;

        $this->miniML_assignment =
            <<<EOF
miniML was a research project I worked on with fellow grad student David Blasen under the directive of Dr. Rob Smith. The objective was to create a machine learning GUI utility built over weka to find optimal features and parameters with the constraint of limiting runtime.
EOF;

        $this->miniML_description =
            <<<EOF
Because weka was the target backend the applicationw as build in Java, originally in Swing and later moved to JavaFX. 
EOF;

        $this->ml_assignment =
<<<EOF

EOF;

        $this->ml_description =
<<<EOF

EOF;
    }

    public function getAll()
    {
        $p_id = 0;
        $data = [
            'projects' => [
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Introduction to Compilers',
                    'course' => 'CSCI592 - Independent Study',
                    'assignment' => $this->compilers_assignment,
                    'description' => $this->compilers_description,
                    'links' => (object) [
                        (object) ['url' => 'https://bitbucket.org/orserang/intro-compiler-design', 'class' => 'bitbucket', 'tooltip' => $this->compilers_link_tooltip],
                    ],
                    'snippets' => [$this->compilers_snippet]
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Fairly Fast Fragment Assembly Program',
                    'course' => 'CSCI558 - Intro to Bioinformatics',
                    'assignment' => $this->fffap_assignment,
                    'description' => $this->fffap_description,
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach/CSCI558-Computational-Biology/blob/master/Grad_Challenge_1/assemble.cpp','class' => 'github',],
                        (object) ['url' => 'https://github.com/falkzach/CSCI558-Computational-Biology','class' => 'github', 'name'=>'Full Computation Biology Repository',],
                    ],
                    'snippets' => [$this->fffap_snippet_0, $this->fffap_snippet_1, $this->fffap_snippet_2],
                    'images' => [
                        (object) ['key' => 0, 'src' => 'img/codewolf_small.png', 'alt' => 'The code wolf girl that appears on Dr. Serangs Custom Screen Printed shirts'],
                        ],
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Another Adventure Game',
                    'course' => 'CSCI412 - Game and Mobile Application Design',
                    'assignment' => $this->adventure_assignment,
                    'description' => $this->adventure_description,
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/um-game/Another-Adventure-Game', 'class' => 'github',],
                        (object) ['url' => asset('files/Another Adventure Game Design Document.pdf'), 'class' => 'file', 'name' => 'Design Document',],
                        (object) ['url' => 'https://github.com/um-game/Another-Adventure-Game/raw/master/final.zip', 'class' => 'github', 'name' => 'Final Build',],
                    ]
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Software Optimization Projects',
                    'course' => 'CSCI595 - Software Optimization',
                    'assignment' => $this->opt_assignment,
                    'description' => $this->opt_description,
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach/CSCI595-Software-Optimization', 'class' => 'github',],
                    ],
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Bike Thing',
                    'course' => 'CSCI595 - Internet of Things',
                    'assignment' => $this->bike_thing_assignment,
                    'description' => $this->bike_thing_description,
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/um-iot/IoT-bike-thing', 'class' => 'github',]
                    ],
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Simulation Modeling Assignments',
                    'course' => 'CSCI477 - Simulation',
                    'assignment' => $this->sim_assignment,
                    'description' => $this->sim_description,
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach/CSCI557-Simulation-Modeling', 'class' => 'github',],
                    ],
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'miniML',
                    'course' => 'CSCI444 - Data Visualization',
                    'assignment' => $this->miniML_assignment,
                    'description' => $this->miniML_description,
                    'links' =>  [
                        (object) ['url' => 'https://github.com/optimusmoose/miniML', 'class' => 'github',]
                    ]
                ],
                (object) [
                    'id' => ++$p_id,
                    'name' => 'Substance Abuse Risk Classified by Quantized Personality Evaluation',
                    'course' => 'CSCI547 - Machine Learning',
                    'assignment' => $this->ml_assignment,
                    'description' => $this->ml_description,
                    'links' => (object) [
                        (object) ['url' => 'https://github.com/falkzach', 'class' => 'github',],
                        (object) ['url' => asset('files/ml_assignment.pdf'), 'class' => 'file', 'name' => 'Assignment',],
                        (object) ['url' => asset('files/falkner_substance_abuse_classification.pdf'), 'class' => 'file', 'name' => 'Report',],

                    ],
                ],
            ],
        ];
        return $data;
    }

//    public function getSAIT() {
//                $data= [
//                'SAIT_APPS' => [
//                'Food Zoo Menu',
//                'Student Hiring',
//                'Bus Tracker',
//                'Girz Card Photos',
//                'Scheduled Email',
//                'Campus Hours',
//                'Directory API',
//                'Comment and Attachment API',
//                'UM Mobile App'
//                //legacy
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
//                ]
//        ];
//    }
}
