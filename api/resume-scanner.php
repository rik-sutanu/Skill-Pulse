<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../backend/security.php';
require_once __DIR__ . '/../backend/data.php';
require_once __DIR__ . '/../config/supabase.php';

// Apply statutory security headers
apply_government_security_headers();

$data = getSkillPulseData();
$jobRoles = $data['JOB_ROLES'] ?? [];

// Available Bridging Courses for Recommendation
$catalogCourses = [
    [
        'id' => 'c1',
        'title' => 'Applied Generative AI & Vector Search Engineering',
        'category' => 'AI & Data',
        'duration' => '6 Weeks',
        'difficulty' => 'Intermediate',
        'skills' => ['python', 'langchain', 'pytorch', 'ai', 'deep learning', 'machine learning'],
        'boost' => '+18% Readiness'
    ],
    [
        'id' => 'c2',
        'title' => 'Enterprise SQL & High-Performance Relational Design',
        'category' => 'AI & Data',
        'duration' => '4 Weeks',
        'difficulty' => 'Beginner-Intermediate',
        'skills' => ['sql', 'postgresql', 'query tuning', 'database design', 'database', 'relational database'],
        'boost' => '+22% Readiness'
    ],
    [
        'id' => 'c3',
        'title' => 'Production React 19 & Next.js Full Stack Systems',
        'category' => 'Web Development',
        'duration' => '8 Weeks',
        'difficulty' => 'Intermediate',
        'skills' => ['react', 'react.js', 'next.js', 'javascript', 'tailwind css', 'html5 & css3', 'rest apis'],
        'boost' => '+24% Readiness'
    ],
    [
        'id' => 'c4',
        'title' => 'Cloud Infrastructure & Kubernetes DevOps Accelerator',
        'category' => 'Cloud & DevOps',
        'duration' => '7 Weeks',
        'difficulty' => 'Advanced',
        'skills' => ['docker', 'kubernetes', 'aws', 'ci/cd', 'linux', 'devops', 'git & github'],
        'boost' => '+25% Readiness'
    ],
    [
        'id' => 'c5',
        'title' => 'Power BI & Interactive Business Intelligence Dashboards',
        'category' => 'Analytics',
        'duration' => '3 Weeks',
        'difficulty' => 'Beginner-Intermediate',
        'skills' => ['power bi', 'excel (advanced)', 'excel', 'data visualization', 'business intelligence', 'dax'],
        'boost' => '+20% Readiness'
    ],
    [
        'id' => 'c6',
        'title' => 'Backend Microservices with Node.js, Express & JWT',
        'category' => 'Backend Development',
        'duration' => '5 Weeks',
        'difficulty' => 'Intermediate',
        'skills' => ['node.js', 'express', 'node.js & express', 'restful api design', 'authentication & jwt', 'apis'],
        'boost' => '+22% Readiness'
    ],
    [
        'id' => 'c7',
        'title' => 'Applied Statistics & Probability for Data Science',
        'category' => 'Data Science',
        'duration' => '3 Weeks',
        'difficulty' => 'Intermediate',
        'skills' => ['statistics & probability', 'statistics', 'exploratory data analysis', 'pandas'],
        'boost' => '+16% Readiness'
    ],
    [
        'id' => 'c8',
        'title' => 'Network Defense & SOC Threat Hunting (SIEM)',
        'category' => 'Cybersecurity',
        'duration' => '6 Weeks',
        'difficulty' => 'Intermediate',
        'skills' => ['network security & protocols', 'linux system administration', 'threat hunting & siem tools', 'vulnerability assessment'],
        'boost' => '+20% Readiness'
    ]
];

// Comprehensive Master Skill Taxonomy for Natural Keyword Extraction
$skillTaxonomy = [
    // Programming Languages
    'python', 'javascript', 'typescript', 'java', 'c++', 'c#', 'php', 'ruby', 'golang', 'rust', 'kotlin', 'swift', 'scala', 'r programming', 'sql', 'bash', 'shell',
    // Frontend
    'react', 'react.js', 'next.js', 'vue', 'vue.js', 'angular', 'html', 'html5', 'css', 'css3', 'html5 & css3', 'tailwind css', 'tailwind', 'bootstrap', 'redux', 'webpack', 'vite', 'sass', 'responsive design',
    // Backend & APIs
    'node.js', 'express', 'node.js & express', 'django', 'flask', 'fastapi', 'spring boot', 'laravel', 'asp.net', 'rest', 'rest apis', 'restful api design', 'graphql', 'grpc', 'microservices', 'jwt', 'authentication & jwt',
    // Databases
    'postgresql', 'mysql', 'mongodb', 'redis', 'sqlite', 'oracle', 'dynamodb', 'elasticsearch', 'firebase', 'cassandra', 'sql & database design', 'database design',
    // Data, BI & ML
    'power bi', 'tableau', 'excel', 'excel (advanced)', 'advanced excel', 'pandas', 'numpy', 'scipy', 'scikit-learn', 'pytorch', 'tensorflow', 'keras', 'statistics', 'statistics & probability', 'data analysis', 'data visualization', 'data visualization & storytelling', 'machine learning', 'deep learning', 'nlp', 'computer vision', 'spark', 'hadoop', 'bigquery',
    // Cloud & DevOps
    'aws', 'azure', 'gcp', 'google cloud', 'docker', 'docker fundamentals', 'kubernetes', 'k8s', 'ci/cd', 'jenkins', 'git', 'github', 'git & github', 'git & version control', 'linux', 'linux system administration', 'terraform', 'ansible', 'nginx',
    // Cybersecurity
    'network security & protocols', 'network security', 'threat hunting & siem tools', 'siem', 'vulnerability assessment', 'ethical hacking', 'firewalls', 'iso 27001', 'owasp', 'penetration testing',
    // Engineering & Industrial TVET
    'autocad', 'cad', 'solidworks', 'catia', 'plc', 'scada', 'matlab', 'cnc', 'quality control', 'six sigma', 'manufacturing', 'robotics',
    // Soft Skills & Methodologies
    'agile', 'scrum', 'jira', 'problem solving', 'critical thinking', 'communication', 'team leadership', 'project management'
];

// Helper: Extract Text from DOCX
function extract_text_from_docx($filePath) {
    if (!class_exists('ZipArchive')) {
        return @file_get_contents($filePath);
    }
    $zip = new ZipArchive();
    if ($zip->open($filePath) === true) {
        $xmlIndex = $zip->locateName('word/document.xml');
        if ($xmlIndex !== false) {
            $xmlData = $zip->getFromIndex($xmlIndex);
            $zip->close();
            return strip_tags(str_replace(['</w:p>', '</w:tr>'], ["\n", "\n"], $xmlData));
        }
        $zip->close();
    }
    return '';
}

// Helper: Extract Text from PDF (basic stream regex fallback)
function extract_text_from_pdf($filePath) {
    $content = @file_get_contents($filePath);
    if (!$content) return '';

    $text = '';
    if (preg_match_all('/BT[\s\r\n]+(.*?)[\s\r\n]+ET/s', $content, $matches)) {
        foreach ($matches[1] as $chunk) {
            if (preg_match_all('/\((.*?)\)[\s\r\n]*T[jJ]/s', $chunk, $textMatches)) {
                $text .= implode(' ', $textMatches[1]) . "\n";
            } elseif (preg_match_all('/\[(.*?)\][\s\r\n]*TJ/s', $chunk, $arrayMatches)) {
                foreach ($arrayMatches[1] as $item) {
                    if (preg_match_all('/\((.*?)\)/s', $item, $inner)) {
                        $text .= implode('', $inner[1]) . ' ';
                    }
                }
                $text .= "\n";
            }
        }
    }

    if (empty(trim($text))) {
        preg_match_all('/[a-zA-Z0-9\s,\.\-@#\+\/]{4,}/', $content, $printable);
        if (!empty($printable[0])) {
            $text = implode(' ', $printable[0]);
        }
    }
    return $text;
}

// --------------------------------------------------------------------------
// GET: Provide Metadata, Roles & Sample Resumes for Quick Testing
// --------------------------------------------------------------------------
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') {
    $samples = [
        [
            'id' => 'sample-data-analyst',
            'label' => 'Junior Data Analyst (Fresher)',
            'roleId' => 'data-analyst',
            'text' => "Aditya Patil | Pune, Maharashtra | aditya.p@example.in | +91 98201 98201\nLinkedIn: linkedin.com/in/aditya-data\n\nOBJECTIVE:\nEnthusiastic Diploma TVET graduate seeking a Junior Data Analyst role. Skilled in SQL querying, Excel reporting, and basic Python data manipulation.\n\nEDUCATION:\nDiploma in Computer Technology - Government Polytechnic Pune (CGPA: 8.6, 2024)\n\nTECHNICAL SKILLS:\nLanguages & Querying: SQL (PostgreSQL, MySQL), Python (Pandas basics), HTML5, CSS\nAnalytics & Tools: Microsoft Excel (VLOOKUP, Pivot Tables), Google Sheets, Git, GitHub\nConcepts: Relational Database Design, Data Cleaning, Descriptive Statistics, Problem Solving\n\nPROJECTS:\n1. Retail Sales Performance Dashboard: Extracted and cleaned 50,000+ sales records using SQL. Generated monthly summary reports in Excel.\n2. Maharashtra Crop Yield Analysis: Basic exploratory data analysis in Python using Pandas and Matplotlib."
        ],
        [
            'id' => 'sample-frontend-dev',
            'label' => 'Frontend Developer (Junior)',
            'roleId' => 'frontend-developer',
            'text' => "Pooja Deshmukh | Mumbai, Maharashtra | pooja.d@example.in | +91 98334 11223\nGitHub: github.com/pooja-dev\n\nSUMMARY:\nFrontend engineer with hands-on experience building reactive web interfaces in React.js and modern JavaScript (ES6+). Passionate about accessible UI and clean component design.\n\nSKILLS:\nFrontend: HTML5, CSS3, JavaScript (ES6+), React.js, Tailwind CSS, Responsive Design\nTools: Git, GitHub, VS Code, npm, Figma, REST APIs, JSON\n\nEXPERIENCE:\nFrontend Intern | Pune Tech Solutions (6 Months)\n- Built 12+ reusable React UI components with Tailwind CSS.\n- Integrated RESTful backend endpoints using fetch and state management.\n- Reduced bundle loading time by 22% through code splitting."
        ],
        [
            'id' => 'sample-backend-dev',
            'label' => 'Backend Developer (Apprentice)',
            'roleId' => 'backend-developer',
            'text' => "Rahul Kadam | Nashik, Maharashtra | rahul.k@example.in\n\nTECHNICAL PROFILE:\nBackend engineering candidate proficient in Node.js, Express, REST API design, and PostgreSQL database modeling.\n\nCORE COMPETENCIES:\nBackend: Node.js, Express, RESTful API Design, JWT Authentication, Microservices\nDatabases: PostgreSQL, MySQL, Redis basics\nDevOps & Tools: Docker fundamentals, Git, GitHub, Linux, Postman\n\nPROJECTS:\n- Student Attendance Microservice: Built an Express.js API with JWT authentication and role-based access control (RBAC). Modeled PostgreSQL schemas with automated indexing.\n- Cloud Task Scheduler: Containerized using Docker and deployed on Linux VM."
        ],
        [
            'id' => 'sample-devops-cloud',
            'label' => 'Cloud & DevOps Enthusiast',
            'roleId' => 'devops-engineer',
            'text' => "Sneha Shinde | Nagpur, Maharashtra | sneha.cloud@example.in\n\nPROFILE:\nCloud and systems engineer with practical knowledge in Linux system administration, Docker containerization, AWS core services, and CI/CD pipelines.\n\nSKILLS:\nCloud: AWS (EC2, S3, IAM, VPC), GCP basics\nDevOps: Docker, Kubernetes fundamentals, Jenkins CI/CD, Git, GitHub, Linux Bash Scripting\nMonitoring: Prometheus basics, CloudWatch"
        ]
    ];

    echo json_encode([
        'success' => true,
        'roles' => $jobRoles,
        'samples' => $samples
    ], JSON_PRETTY_PRINT);
    exit;
}

// --------------------------------------------------------------------------
// POST: Scan Resume Text or Uploaded Document
// --------------------------------------------------------------------------
$rawInput = file_get_contents('php://input');
$jsonBody = json_decode($rawInput, true);

$resumeText = '';
$sourceFilename = 'Pasted Text';
$targetRoleId = $_POST['targetRole'] ?? $jsonBody['targetRole'] ?? 'auto';

// Case A: File Upload
if (!empty($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['resume'];
    $sourceFilename = htmlspecialchars($file['name'], ENT_QUOTES, 'UTF-8');
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($ext === 'docx') {
        $resumeText = extract_text_from_docx($file['tmp_name']);
    } elseif ($ext === 'pdf') {
        $resumeText = extract_text_from_pdf($file['tmp_name']);
    } else {
        $resumeText = @file_get_contents($file['tmp_name']);
    }
}
// Case B: Raw Text Payload
elseif (!empty($jsonBody['resumeText'])) {
    $resumeText = $jsonBody['resumeText'];
    $sourceFilename = $jsonBody['filename'] ?? 'Pasted Document / Profile Text';
} elseif (!empty($_POST['resumeText'])) {
    $resumeText = $_POST['resumeText'];
}

$resumeText = trim($resumeText);

if (empty($resumeText) || strlen($resumeText) < 30) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please provide valid resume text or upload a readable PDF, DOCX, or TXT document (minimum 30 characters).'
    ]);
    exit;
}

// 1. Natural Skill Extraction via Taxonomy Matching & Word Boundaries
$lowerResume = ' ' . strtolower(preg_replace('/[^a-z0-9\+\#\.\s\/\-]/i', ' ', $resumeText)) . ' ';

$extractedSkills = [];
$foundSkillMap = [];

foreach ($skillTaxonomy as $skill) {
    $escaped = preg_quote($skill, '/');
    if (preg_match('/(?:^|[\s\/\,\.\;\:\(\)\[\]\-])' . $escaped . '(?:[\s\/\,\.\;\:\(\)\[\]\-]|$)/i', $lowerResume)) {
        $normalizedName = ucwords($skill);
        $acronyms = [
            'Sql' => 'SQL', 'Html' => 'HTML', 'Html5' => 'HTML5', 'Css' => 'CSS', 'Css3' => 'CSS3', 
            'React.js' => 'React.js', 'Node.js' => 'Node.js', 'Next.js' => 'Next.js', 'Vue.js' => 'Vue.js', 
            'Jwt' => 'JWT', 'Aws' => 'AWS', 'Gcp' => 'GCP', 'Ci/cd' => 'CI/CD', 'Api' => 'API', 
            'Apis' => 'APIs', 'Cad' => 'CAD', 'Plc' => 'PLC', 'Scada' => 'SCADA', 'Nlp' => 'NLP', 'Siem' => 'SIEM'
        ];
        foreach ($acronyms as $k => $v) {
            if (strcasecmp($normalizedName, $k) === 0) {
                $normalizedName = $v;
                break;
            }
        }
        $extractedSkills[] = $normalizedName;
        $foundSkillMap[strtolower($skill)] = true;
    }
}

$extractedSkills = array_values(array_unique($extractedSkills));

// Basic Identity & Contact extraction
$email = '';
if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $resumeText, $m)) {
    $email = $m[0];
}

$phone = '';
if (preg_match('/(?:\+91[\-\s]?)?[6-9]\d{9}/', $resumeText, $m)) {
    $phone = $m[0];
}

$name = 'Candidate';
$lines = explode("\n", $resumeText);
foreach ($lines as $line) {
    $trimmed = trim($line);
    if (strlen($trimmed) >= 3 && strlen($trimmed) <= 40 && !preg_match('/(resume|curriculum|profile|contact|email|phone|objective)/i', $trimmed)) {
        $clean = preg_replace('/[^a-zA-Z\s\.]/', '', $trimmed);
        if (str_word_count($clean) >= 2 && str_word_count($clean) <= 4) {
            $name = ucwords(strtolower(trim($clean)));
            break;
        }
    }
}

// 2. Score Against All Roles to Find Best Match & Full Comparison Leaderboard
$roleEvaluations = [];
$bestRole = null;
$highestScore = -1;

foreach ($jobRoles as $role) {
    $reqs = $role['requiredSkills'] ?? [];
    $totalWeight = 0;
    $earnedWeight = 0;
    $matched = [];
    $missing = [];

    foreach ($reqs as $req) {
        $w = (int)($req['weight'] ?? 15);
        $totalWeight += $w;
        $reqNameLower = strtolower(trim($req['name']));

        $isMatched = false;
        if (isset($foundSkillMap[$reqNameLower])) {
            $isMatched = true;
        } else {
            foreach (array_keys($foundSkillMap) as $fs) {
                if (strlen($fs) >= 3 && (stripos($reqNameLower, $fs) !== false || stripos($fs, $reqNameLower) !== false)) {
                    $isMatched = true;
                    break;
                }
            }
        }

        if ($isMatched) {
            $earnedWeight += $w;
            $matched[] = $req;
        } else {
            $missing[] = $req;
        }
    }

    $score = $totalWeight > 0 ? round(($earnedWeight / $totalWeight) * 100) : 0;

    $eval = [
        'id' => $role['id'],
        'title' => $role['title'],
        'salaryRange' => $role['salaryRange'] ?? '₹5L - ₹10L / yr',
        'score' => $score,
        'matchedCount' => count($matched),
        'missingCount' => count($missing),
        'totalCount' => count($reqs),
        'matchedSkills' => $matched,
        'missingSkills' => $missing,
        'recommendedPath' => $role['recommendedPath'] ?? []
    ];

    $roleEvaluations[] = $eval;

    if ($score > $highestScore) {
        $highestScore = $score;
        $bestRole = $eval;
    }
}

// Determine active target role
$activeEvaluation = $bestRole;
if ($targetRoleId !== 'auto') {
    foreach ($roleEvaluations as $ev) {
        if ($ev['id'] === $targetRoleId) {
            $activeEvaluation = $ev;
            break;
        }
    }
}

if (!$activeEvaluation && !empty($roleEvaluations)) {
    $activeEvaluation = $roleEvaluations[0];
}

// 3. Find Bonus / Adjacent Skills
$targetReqNames = [];
foreach ($activeEvaluation['matchedSkills'] as $m) $targetReqNames[strtolower($m['name'])] = true;
foreach ($activeEvaluation['missingSkills'] as $m) $targetReqNames[strtolower($m['name'])] = true;

$bonusSkills = [];
foreach ($extractedSkills as $sk) {
    if (!isset($targetReqNames[strtolower($sk)])) {
        $bonusSkills[] = $sk;
    }
}

// 4. Map Missing Skills to Tailored Bridging Courses
$recommendedBridges = [];
$usedCourseIds = [];

foreach ($activeEvaluation['missingSkills'] as $gap) {
    $gapLower = strtolower($gap['name']);
    $foundCourse = null;

    foreach ($catalogCourses as $course) {
        if (isset($usedCourseIds[$course['id']])) continue;
        foreach ($course['skills'] as $cSkill) {
            if (stripos($gapLower, $cSkill) !== false || stripos($cSkill, $gapLower) !== false) {
                $foundCourse = $course;
                $usedCourseIds[$course['id']] = true;
                break 2;
            }
        }
    }

    if ($foundCourse) {
        $recommendedBridges[] = array_merge($foundCourse, [
            'closingSkill' => $gap['name'],
            'priority' => $gap['priority']
        ]);
    }
}

if (empty($recommendedBridges) && !empty($catalogCourses)) {
    $recommendedBridges[] = array_merge($catalogCourses[1], ['closingSkill' => 'Core Relational & Problem Solving']);
}

// 5. Generate Actionable Resume Polish / ATS Recommendations
$actionableTips = [];
if ($activeEvaluation['score'] < 80) {
    $missingHigh = array_filter($activeEvaluation['missingSkills'], fn($s) => ($s['priority'] ?? '') === 'High');
    if (!empty($missingHigh)) {
        $highNames = implode(', ', array_map(fn($s) => $s['name'], array_slice($missingHigh, 0, 3)));
        $actionableTips[] = [
            'type' => 'critical',
            'title' => 'Bridge High-Priority Role Keywords',
            'desc' => "Corporate recruiters filter for <strong>{$highNames}</strong>. Completing bridging projects in these topics will directly raise your ATS score."
        ];
    }
}

$actionableTips[] = [
    'type' => 'metric',
    'title' => 'Quantify Project Outcomes',
    'desc' => 'Replace generic bullet points with measurable impact metrics (e.g. <em>"Reduced query load time by 35%"</em> or <em>"Handled 50k+ records"</em>).'
];

$actionableTips[] = [
    'type' => 'proof',
    'title' => 'Link GitHub or Live Deployment',
    'desc' => 'Ensure your GitHub repository or live URL is clearly hyperlinked at the top of your resume for automated crawler verification.'
];

// 6. Persist to Supabase public.resume_scans & Award +25 XP
if (supabase_is_configured()) {
    supabase_save_resume_scan([
        'user_id' => 'usr_student_demo',
        'candidate_name' => $name,
        'target_role' => $activeEvaluation['title'] ?? 'Technical Professional',
        'overall_score' => (int)($activeEvaluation['score'] ?? 70),
        'matched_skills' => $activeEvaluation['matchedSkills'] ?? [],
        'missing_skills' => $activeEvaluation['missingSkills'] ?? [],
        'recommended_courses' => $recommendedBridges ?? [],
        'recommendations' => $actionableTips ?? []
    ]);
    supabase_award_xp('usr_student_demo', 25, 'diagnostics');
    supabase_log_security_event('RESUME_ATS_DIAGNOSTIC_COMPLETED', $email ?: 'candidate@skillpulse.in', 'SUCCESS', [
        'target_role' => $activeEvaluation['title'] ?? 'General',
        'score' => (int)($activeEvaluation['score'] ?? 70)
    ]);
}

// Mirror points to local JSON fallback
$pointsFile = __DIR__ . '/../backend/user_points.json';
$currentPoints = [];
if (file_exists($pointsFile)) {
    $currentPoints = json_decode(file_get_contents($pointsFile), true) ?: [];
}
if (!empty($currentPoints)) {
    $currentPoints['totalXp'] = ($currentPoints['totalXp'] ?? 1340) + 25;
    $currentPoints['activityLedger'] = $currentPoints['activityLedger'] ?? [];
    array_unshift($currentPoints['activityLedger'], [
        'id' => 'act_' . time(),
        'title' => "Scanned Resume against {$activeEvaluation['title']} Track",
        'category' => 'Resume AI Diagnostic',
        'xp' => 25,
        'time' => 'Just now',
        'impact' => "Target Match: {$activeEvaluation['score']}%"
    ]);
    if (count($currentPoints['activityLedger']) > 15) {
        $currentPoints['activityLedger'] = array_slice($currentPoints['activityLedger'], 0, 15);
    }
    @file_put_contents($pointsFile, json_encode($currentPoints, JSON_PRETTY_PRINT));
}

// 7. Assemble Comprehensive Response
echo json_encode([
    'success' => true,
    'candidate' => [
        'name' => $name,
        'email' => $email ?: 'candidate@skillpulse.in',
        'phone' => $phone ?: '+91 98201 98201',
        'filename' => $sourceFilename,
        'wordCount' => str_word_count($resumeText),
        'characterCount' => strlen($resumeText)
    ],
    'extractedSkills' => $extractedSkills,
    'targetRole' => $activeEvaluation,
    'allRolesLeaderboard' => $roleEvaluations,
    'bonusSkills' => array_slice($bonusSkills, 0, 8),
    'bridgingCourses' => $recommendedBridges,
    'atsOptimizationTips' => $actionableTips,
    'xpAwarded' => 25,
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
