<?php
require_once __DIR__ . '/../backend/security.php';
apply_government_security_headers();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../backend/data.php';
require_once __DIR__ . '/../config/supabase.php';
$masterData = getSkillPulseData();

$portals = $masterData['GOVT_PORTALS'] ?? [];
$govtMetrics = $masterData['MAHARASHTRA_GOVT_METRICS'] ?? [];

// Category filter
$category = isset($_GET['category']) ? trim($_GET['category']) : 'all';
// Scheme filter: all, govt, paid
$scheme = isset($_GET['scheme']) ? trim($_GET['scheme']) : 'all';
// Search query
$query = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

$cloudCourses = [];
if (supabase_is_configured()) {
    $sbRes = supabase_rest_request('courses', 'GET', null, ['is_active' => 'eq.true'], true);
    if (!empty($sbRes['success']) && is_array($sbRes['data']) && count($sbRes['data']) > 0) {
        $cloudCourses = $sbRes['data'];
    }
}

if (!empty($cloudCourses)) {
    $enrichedCourses = array_map(function($c) {
        $tags = is_array($c['tags'] ?? null) ? $c['tags'] : (json_decode($c['tags'] ?? '[]', true) ?: []);
        $modules = is_array($c['modules'] ?? null) ? $c['modules'] : (json_decode($c['modules'] ?? '[]', true) ?: [
            'Module 1: Foundations & Industry Lab Setup',
            'Module 2: Core Competency Deep-Dive & Labs',
            'Module 3: Optimization, Error Handling & Security Best Practices',
            'Module 4: Capstone Evaluation & Placement Passport Credentialing'
        ]);
        $isGovt = !empty($c['is_govt_sponsored']);
        return [
            'id' => $c['id'],
            'title' => $c['title'],
            'provider' => $c['provider'],
            'providerType' => 'State Industry Partner',
            'category' => $c['category'],
            'skill' => $c['category'],
            'level' => $c['level'] ?? 'Intermediate',
            'duration' => $c['duration'],
            'rating' => (float)($c['rating'] ?? 4.8),
            'reviewsCount' => 1250,
            'isFree' => $isGovt,
            'priceLabel' => $isGovt ? 'Free to Audit' : 'Paid',
            'shortDescription' => $c['short_description'] ?? $c['description'] ?? '',
            'url' => $c['url'],
            'tags' => $tags,
            'skillsCovered' => $tags,
            'schemeType' => $isGovt ? 'mahaswayam_subsidized' : 'paid_integrated',
            'schemeLabel' => $isGovt 
                ? 'MahaSwayam Youth Skill Voucher (100% State Sponsored)' 
                : 'Corporate Co-Sponsored / Paid Integrated Track',
            'schemeBadge' => $isGovt ? '🏛️ MahaSwayam Free Voucher' : '💼 Industry Paid Track',
            'isGovtSubsidized' => $isGovt,
            'portalUrl' => $isGovt ? 'https://www.mahaswayam.gov.in/' : $c['url'],
            'portalName' => $isGovt ? 'MahaSwayam Portal' : 'Partner Portal',
            'seatsAvailable' => (int)($c['enrolled'] ?? 35),
            'wageBoostPercent' => $c['wage_boost'] ?? '+25%',
            'wageBoostText' => ($c['wage_boost'] ?? '+25%') . ' Hiring Advantage on MahaSwayam',
            'certifiedBody' => $isGovt ? 'DVET Maharashtra / MSBTE / SWAYAM Recognized' : 'Industry Specialized Consortium',
            'modules' => $modules
        ];
    }, $cloudCourses);
} else {
    $courses = $masterData['COURSES'] ?? [];
    $enrichedCourses = array_map(function($c) {
        $id = $c['id'];
        $isGovt = in_array($id, ['c1', 'c2', 'c3', 'c4', 'c6', 'c8', 'c9', 'c11', 'c12']);
        $isPaid = !$isGovt;
        $seats = 35 + (crc32($id . 'seats') % 45);
        $wageBoost = 18 + (crc32($id . 'boost') % 16);
        return [
            'id' => $c['id'],
            'title' => $c['title'],
            'provider' => $c['provider'] ?? 'SkillPulse TVET Network',
            'providerType' => $c['providerType'] ?? 'State Industry Partner',
            'category' => $c['category'] ?? 'General',
            'skill' => $c['skill'] ?? 'Core',
            'level' => $c['level'] ?? 'Intermediate',
            'duration' => $c['duration'] ?? '6 Weeks',
            'rating' => $c['rating'] ?? 4.8,
            'reviewsCount' => $c['reviewsCount'] ?? 1250,
            'isFree' => $c['isFree'] ?? true,
            'priceLabel' => $c['priceLabel'] ?? ($isGovt ? 'Free to Audit' : 'Paid'),
            'shortDescription' => $c['shortDescription'] ?? '',
            'url' => $c['url'] ?? 'https://www.mahaswayam.gov.in/',
            'tags' => $c['tags'] ?? [],
            'skillsCovered' => $c['tags'] ?? [$c['skill'] ?? 'Technical'],
            'schemeType' => $isGovt ? 'mahaswayam_subsidized' : 'paid_integrated',
            'schemeLabel' => $isGovt 
                ? 'MahaSwayam Youth Skill Voucher (100% State Sponsored)' 
                : 'Corporate Co-Sponsored / Paid Integrated Track',
            'schemeBadge' => $isGovt ? '🏛️ MahaSwayam Free Voucher' : '💼 Industry Paid Track',
            'isGovtSubsidized' => $isGovt,
            'portalUrl' => $isGovt ? 'https://www.mahaswayam.gov.in/' : ($c['url'] ?? 'https://www.mahaswayam.gov.in/'),
            'portalName' => $isGovt ? 'MahaSwayam Portal' : 'Partner Portal',
            'seatsAvailable' => $seats,
            'wageBoostPercent' => '+' . $wageBoost . '%',
            'wageBoostText' => '+' . $wageBoost . '% Hiring Advantage on MahaSwayam',
            'certifiedBody' => $isGovt ? 'DVET Maharashtra / MSBTE / SWAYAM Recognized' : 'Industry Specialized Consortium',
            'modules' => [
                'Foundations & Industry Lab Setup',
                'Core Competency & Case Studies',
                'Production Problem Solving & Optimization',
                'Capstone Project Assessment & MahaSwayam Credentialing'
            ]
        ];
    }, $courses);
}

// Filter by category
if ($category !== 'all' && $category !== '') {
    $enrichedCourses = array_filter($enrichedCourses, function($c) use ($category) {
        if (strcasecmp($c['category'], $category) === 0) return true;
        // Check partial matches e.g. "AI & Data" vs "AI / ML" or "Data Analytics"
        if ($category === 'AI & Data') {
            return in_array($c['category'], ['AI & Data', 'AI / ML', 'Data Analytics', 'Data Science']);
        }
        if ($category === 'Web Development') {
            return in_array($c['category'], ['Web Development', 'Programming']);
        }
        if ($category === 'Cloud & DevOps') {
            return in_array($c['category'], ['Cloud', 'Cloud & DevOps', 'DevOps']);
        }
        if ($category === 'Cybersecurity') {
            return in_array($c['category'], ['Cybersecurity', 'Security']);
        }
        return false;
    });
}

// Filter by scheme
if ($scheme === 'govt' || $scheme === 'mahaswayam') {
    $enrichedCourses = array_filter($enrichedCourses, function($c) {
        return $c['isGovtSubsidized'] === true;
    });
} elseif ($scheme === 'paid') {
    $enrichedCourses = array_filter($enrichedCourses, function($c) {
        return $c['isGovtSubsidized'] === false;
    });
}

// Filter by search query
if (!empty($query)) {
    $enrichedCourses = array_filter($enrichedCourses, function($c) use ($query) {
        $haystack = strtolower($c['title'] . ' ' . $c['provider'] . ' ' . $c['category'] . ' ' . implode(' ', $c['tags']));
        return strpos($haystack, $query) !== false;
    });
}

// Re-index array
$enrichedCourses = array_values($enrichedCourses);

echo json_encode([
    'success' => true,
    'total' => count($enrichedCourses),
    'governmentSponsoredCount' => count(array_filter($enrichedCourses, fn($c) => $c['isGovtSubsidized'])),
    'paidIntegratedCount' => count(array_filter($enrichedCourses, fn($c) => !$c['isGovtSubsidized'])),
    'filters' => [
        'category' => $category,
        'scheme' => $scheme,
        'query' => $query
    ],
    'mahaswayamLiveVacancies' => $govtMetrics['activeVacanciesMahaSwayam'] ?? 284350,
    'courses' => $enrichedCourses,
    'officialPortals' => $portals,
    'timestamp' => date('c')
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
