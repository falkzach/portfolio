<?php namespace falkzach\portfolio\Project;


class SAITProjectRepository
{
    private $headline;
    private $commonComponentsDescription;
    private $otherDescription;

    public function __construct()
    {
        $this->headline =
            <<<EOF
During my time as an undergraduate at the University of Montana, I worked for the Department of Student Affairs IT as a Full Stack Software Applications Developer for about two and a half years. The code bases for these applications are closed and many are not public facing, however I can share some screenshots and descriptions of problems these applications solved. Public facing links are provided where appropriate. All applications are built with a strong focus on meeting WCAG 2.0 Web Accessibility Standards. Special Thanks to Eric Seyden, Dan Bowling, Jason Cowan, Antony Jo, Jesse Neidigh, and the rest of the SAIT staff. You were all instrumental in my growth as a developer and it was a pleasure working with you all.
EOF;
        $this->commonComponentsDescription =
            <<<EOF
Many of the applications we built utilized common components which we compartmentalized into their own repositories. This included themes and templates, authentication, and api client components.
<ul>
<li>Comment API Client</li>
<li>Directory API Client</li>
<li>CodeIgniter Inputs</li>
<li>CodeIgniter Exceptions</li>
<li>CodeIgniter Security</li>
<li>Laravel LDAP Authentication</li>
<li>Laravel SAML Authentication</li>
<li>Laravel Email Queue API Driver</li>
<li>Common CSS and Javascript</li>
<li>UM Bootstrap Theme</li>
</ul>
EOF;

        $this->otherDescription = 
            <<<EOF
In addition to the apps featured above, I played a role in maintaining and improving several existing applications. Some of these are now retired while others continue to serve the University of Montana Campus.
<ul>
<li>Hall Snacks</li>
<li>Bear Hugs</li>
<li>Game Room Table Timers</li>
<li>RLO Discipline Database</li>
<li>RLO Duty Log</li>
<li>Renter Center Housing</li>
<li>Renter Center Landlord Review</li>
<li>Veterens Affairs Notification of Intent</li>
<li>Veterens Affairs Data Warehouse</li>
</ul>
EOF;
    }

    public function getALL()
    {
        $p_id = 0;
        $data = [
            'headline' => $this->headline,
            'projects' => [

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Food Zoo Menu',
                    'department' => 'UM Dining',
                    'description' => 'The Food Zoo Menu was my first full ground up project with Student Affairs IT. Prior to its development menus for the Food Zoo at the University of Montana were made as a PowerPoint to be displayed outside on a TV. This process was labor intensive, the menus provided no nutritional information, and menus were only available outside the Food Zoo. Alternatives implementations were explored, included a produced from the backend enterpise software that UM Dining uses. However cost was prohibative and available features fell short of need so ultimatly a custom solution was decided on. All information is pulled directly from the existing system. Overrides for what menus are displayed, item name changes and other display controls are available to UM Dining staff. Once item and menu overrides are configured the application is mostly hands off eliminating the daily labor of producing menus. The app consists of a CRUD management backend, an Angular frontend integrated into the UM page, a React Compontent within the UM App, a menu board page that directly feeds the TV menu`s at the Food Zoo, and generates printable cards with nutritional information. The application allows users to filter based on dietary needs and alergens and more easily plan their meals. I take great pride in this application and know many people who use it reguarly while on campus. When I last asked, it was 2nd by analitics on the umt domain only to the home page.',
                    'links' => (object) [
                        (object) ['url' => 'https://www.umt.edu/dining/foodzoomenu','class' => 'external-link',],
                    ],
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/umd_fzm_0.png', 'alt' => ''],
                        (object) ['key' => 1, 'src' => 'img/sait/umd_fzm_1.png', 'alt' => ''],
                        (object) ['key' => 2, 'src' => 'img/sait/umd_fzm_2.png', 'alt' => ''],
                        (object) ['key' => 3, 'src' => 'img/sait/umd_fzm_3.png', 'alt' => ''],
                        (object) ['key' => 4, 'src' => 'img/sait/umd_fzm_4.png', 'alt' => ''],
                        (object) ['key' => 5, 'src' => 'img/sait/umd_fzm_5.png', 'alt' => ''],
                        (object) ['key' => 6, 'src' => 'img/sait/umd_fzm_6.png', 'alt' => ''],
                        (object) ['key' => 7, 'src' => 'img/sait/um_mobile_3.png', 'alt' => ''],
                        (object) ['key' => 8, 'src' => 'img/sait/um_mobile_4.png', 'alt' => ''],
                        (object) ['key' => 9, 'src' => 'img/sait/um_mobile_5.png', 'alt' => ''],
                    ],
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Student Hiring',
                    'department' => 'University of Montana',
                    'description' => 'The student hiring application was built in response to the need for optimized workflow in hiring students on campus. The app allows for construction of job applications with custom content of all HTML Form types including WYSIWYGs and accessible checkbox grids. Hiring staff can track candidates, comment on resumes with other hiring panel members, and respond to candidates via email. We got to use the application to hire my replacement! This app inspired the development of the Comment and Attachment API as the mechanism for Resume submission and discussion.',
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/um_hiring_0.png', 'alt' => ''],
                        (object) ['key' => 1, 'src' => 'img/sait/um_hiring_1.png', 'alt' => ''],
                        (object) ['key' => 2, 'src' => 'img/sait/um_hiring_2.png', 'alt' => ''],
                        (object) ['key' => 3, 'src' => 'img/sait/um_hiring_3.png', 'alt' => ''],
                        (object) ['key' => 4, 'src' => 'img/sait/um_hiring_4.png', 'alt' => ''],
                        (object) ['key' => 5, 'src' => 'img/sait/um_hiring_5.png', 'alt' => ''],
                        (object) ['key' => 6, 'src' => 'img/sait/um_hiring_6.png', 'alt' => ''],
                        (object) ['key' => 7, 'src' => 'img/sait/um_hiring_7.png', 'alt' => ''],
                        (object) ['key' => 8, 'src' => 'img/sait/um_hiring_8.png', 'alt' => ''],
                        (object) ['key' => 9, 'src' => 'img/sait/um_hiring_9.png', 'alt' => ''],
                        (object) ['key' => 10, 'src' => 'img/sait/um_hiring_10.png', 'alt' => ''],
                        (object) ['key' => 11, 'src' => 'img/sait/um_hiring_11.png', 'alt' => ''],
                    ]
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Bus Tracker',
                    'department' => 'ASUM Office of Transportation',
                    'description' => 'The ASUM Office of Transportation was having difficulty tracking paperwork. Federal compliance can be difficult and excel spread sheets were not cutting it. The Bus Tracker application streamlined their paperwork workflow greatly reducing data entry time, reduced errors through data validation, simplified report generation, and allowed the ASUM Office of Transportation to easily maintain federal compliance.',
                    'links' => (object) [
                        
                    ],
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/um_bus_0.png', 'alt' => ''],
                        (object) ['key' => 1, 'src' => 'img/sait/um_bus_1.png', 'alt' => ''],
                        (object) ['key' => 2, 'src' => 'img/sait/um_bus_2.png', 'alt' => ''],
                        (object) ['key' => 3, 'src' => 'img/sait/um_bus_3.png', 'alt' => ''],
                        (object) ['key' => 4, 'src' => 'img/sait/um_bus_4.png', 'alt' => ''],
                        (object) ['key' => 5, 'src' => 'img/sait/um_bus_5.png', 'alt' => ''],
                    ],
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Girz Card Online Photo Submission',
                    'department' => 'Griz Card Center',
                    'description' => 'Orientation can be an exciting time for incoming freshman students. Nothing puts a damper on that excitement like standing in a line all afternoon to get your student ID. The Online Photo Submission App was built to allow students to snap a picture at home, submit, center, and crop online. Once approved pick up their student ID quickly at the Griz Card Center. The release of this application killed the long lines at orientation and greatly increased the efficiency of the Griz Card Center.',
                    'links' => (object) [
                        (object) ['url' => 'http://www.umt.edu/griz-card/get-your-griz-card/online_photo_submission/default.php','class' => 'external-link',],
                    ],
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/gcc_photo_0.png', 'alt' => 'Cropping and centering an uploaded photo in the GCC Online Photo Submission application.'],
                        (object) ['key' => 1, 'src' => 'img/sait/gcc_photo_1.png', 'alt' => 'Confirming an uploaded photo in the GCC Online Photo Submission application.'],
                        (object) ['key' => 2, 'src' => 'img/sait/gcc_photo_2.png', 'alt' => 'Staff review of an uploaded photo in the GCC Online Photo Submission application.'],
                    ],
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Scheduled Emails',
                    'department' => 'Student Affairs IT',
                    'description' => 'The Scheduled Emails application was built as a way to automate several administrative and management tasks. The application allows for one time and scheduled emails to be sent to individuals or groups. Whether queuing up staff emails for training or setting up reminders for critical system maintenance this utility quickly found many previously unpondered use cases within the department.',
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Campus Hours',
                    'department' => 'University of Montana',
                    'description' => 'There is nothing worse than walking across campus to find that your destination is closed. The Campus Hours application was built to integrate an open hour’s directory into the UM Mobile App to make up to make current open hours easily accessible to the campus community. It is comprised of a CRUD backend that allows office managers to configure their open hours, a REST API, and a ReactJS frontend component within the UM Mobile App.',
                    'links' => (object) [
                        
                    ],
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/um_mobile_0.png', 'alt' => ''],
                        (object) ['key' => 1, 'src' => 'img/sait/um_mobile_1.png', 'alt' => ''],
                        (object) ['key' => 2, 'src' => 'img/sait/um_mobile_2.png', 'alt' => ''],
                    ],
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Email Queue API',
                    'department' => 'Student Affairs IT',
                    'description' => 'The Email Queue API was the first piece of microservice architecture for the SAIT applications. It provided a centralized  service to queue and manage outgoing emails and enabled retention, recover and resending of failed deliveries. It was originally built before I started at the office, but I partook in improvements, devops, and integration with various applications.',
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Directory API',
                    'department' => 'Student Affairs IT',
                    'description' => 'The directory API was a microservice built to provide lookup of University of Montana directory information in various applications; for example, references in the Student Hiring Platform.',
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Comment and Attachment API',
                    'department' => 'Student Affairs IT',
                    'description' => 'The Comments and Attachments API was a microservice built in response to the need for comments and attachment functionality across several of the department supported applications. It provided a standard interface, extendable frontend templates, and simplified file storage and backup.',
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'UM Mobile App',
                    'department' => 'University of Montana',
                    'description' => 'My contributions to the University of Montana Mobile App were the Campus Open Hours directory which I was the primary developer of both the front and back end, as well as significant work on the Food Zoo Menu section.',
                    'links' => (object) [
                        (object) ['url' => 'https://play.google.com/store/apps/details?id=com.ombiel.campusm.montana','name'=>'Play Store','class' => 'google',],
                        (object) ['url' => 'https://itunes.apple.com/us/app/university-of-montana/id1134006825','name'=>'App Store','class' => 'apple',],
                    ],
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/um_mobile_0.png', 'alt' => ''],
                        (object) ['key' => 1, 'src' => 'img/sait/um_mobile_1.png', 'alt' => ''],
                        (object) ['key' => 2, 'src' => 'img/sait/um_mobile_2.png', 'alt' => ''],
                        (object) ['key' => 3, 'src' => 'img/sait/um_mobile_3.png', 'alt' => ''],
                        (object) ['key' => 4, 'src' => 'img/sait/um_mobile_4.png', 'alt' => ''],
                        (object) ['key' => 5, 'src' => 'img/sait/um_mobile_5.png', 'alt' => ''],
                    ],
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Merchant Map',
                    'department' => 'Griz Card Center',
                    'description' => 'I didn`t build the Merchant Map, but I recovered it. After reviewing applications to move into our CI/CD Stack, I discovered that the merchant map had been nonfunctional for some time due to Google Maps API Changes. To be clear the scope of this app is limited to the merchant pin flags on the map, the full interactive map application built by the UM Web Technology Services Group.',
                    'links' => (object) [
                        (object) ['url' => 'http://map.umt.edu/umoney','name'=>'Umoney Map','class' => 'external-link',],
                        
                    ]
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'DCO Home',
                    'department' => 'Student Affairs IT',
                    'description' => 'DCO Home is the central dashboard Student Affairs IT office. It provided departmental time clocking and approval, a robust IT ticketing system, service billing and much more. Some of my earliest work for SAIT was helping to build the achievements system. Curiously this app performs few of the tasks of its namesake, Direct Connect Office Home. DHCP control, switch management, DMCA violation tracking, mac blocking, and other network management tasks all still remained despite no longer being in use. During my final months with SAIT I removed thousands of lines of code eliminating all of the CRUFT, including an antiquated ticket and timeclock system. I also provided significant overhaul to the current ticketing system with improved status and tracking features and integration of the Comment and Attachment API.',
                    'images' => (object) [
                        (object) ['key' => 0, 'src' => 'img/sait/dco_0.png', 'alt' => ''],
                        (object) ['key' => 1, 'src' => 'img/sait/dco_1.png', 'alt' => ''],
                        (object) ['key' => 2, 'src' => 'img/sait/dco_2.png', 'alt' => ''],
                        (object) ['key' => 3, 'src' => 'img/sait/dco_3.png', 'alt' => ''],
                        (object) ['key' => 4, 'src' => 'img/sait/dco_4.png', 'alt' => ''],
                        (object) ['key' => 5, 'src' => 'img/sait/dco_5.png', 'alt' => ''],
                        (object) ['key' => 6, 'src' => 'img/sait/dco_6.png', 'alt' => ''],
                        (object) ['key' => 7, 'src' => 'img/sait/dco_7.png', 'alt' => ''],
                        (object) ['key' => 8, 'src' => 'img/sait/dco_8.png', 'alt' => ''],
                    ]
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Puppet, Vagrant, Jenkins, EL7...',
                    'department' => 'Student Affairs IT',
                    'description' => 'During my time at SAIT, the team worked to manage all of our applications through a Configuration Management using Puppet, environment management with vagrant, and Continuous Integration and Deployment with Jenkins and git hooks. This enabled a highly effective build chain that enabled all aps to be tested in local environments that matched production and any developer to update existing or deploy new applications with just a pull request.',
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Common Components',
                    'department' => 'Student Affairs IT',
                    'description' => $this->commonComponentsDescription,
                ],

                (object) [
                    'id' => ++$p_id,
                    'name' => 'Other...',
                    'department' => 'Division of Student Student Affairs',
                    'description' => $this->otherDescription,
                ],
            ],
        ];

        return $data;
    }
}
