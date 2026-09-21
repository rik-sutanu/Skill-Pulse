<?php
require_once __DIR__ . '/../backend/security.php';
require_once __DIR__ . '/../config/supabase.php';
apply_government_security_headers();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$pointsFile = __DIR__ . '/../backend/user_points.json';

// Default initial state for demonstration candidate
$defaultState = [
    'userId' => 'usr_student_demo',
    'candidateName' => 'Aditya Patil',
    'targetRole' => 'Data Analyst / TVET Candidate',
    'totalXp' => 1340,
    'currentLevel' => 4,
    'levelTitle' => 'Advanced TVET Practitioner',
    'nextLevelXp' => 1500,
    'tier' => 'Gold',
    'tierColor' => '#F59E0B',
    'streakDays' => 12,
    'readinessScore' => 78,
    'percentile' => 92, // Top 8% in Maharashtra
    'dimensions' => [
        'practice' => ['label' => 'Technical Practice Arena', 'xp' => 420, 'items' => 18, 'icon' => '⚡'],
        'courses' => ['label' => 'Bridging Modules & Labs', 'xp' => 380, 'items' => 8, 'icon' => '📚'],
        'diagnostics' => ['label' => 'Skill Gap Diagnostic Retests', 'xp' => 320, 'items' => 5, 'icon' => '🎯'],
        'verification' => ['label' => 'Govt Verification & Mentorship', 'xp' => 220, 'items' => 3, 'icon' => '🛡️']
    ],
    'weeklyImprovement' => [
        ['week' => 'Week 1', 'xp' => 180, 'readiness' => 62, 'highlight' => 'Baseline diagnostic & initial Trade test'],
        ['week' => 'Week 2', 'xp' => 290, 'readiness' => 68, 'highlight' => 'SQL Foundations & Practice Arena'],
        ['week' => 'Week 3', 'xp' => 380, 'readiness' => 74, 'highlight' => 'Power BI DAX & DigiLocker ADV Sync'],
        ['week' => 'Current Week', 'xp' => 490, 'readiness' => 78, 'highlight' => 'Advanced Query Design & Mentorship']
    ],
    'activityLedger' => [
        ['id' => 'act_101', 'title' => 'Solved Python Data Aggregation Challenge', 'category' => 'Practice Arena', 'xp' => 30, 'time' => 'Today, 11:20 AM', 'impact' => '+1.2% Readiness'],
        ['id' => 'act_102', 'title' => 'Completed SQL Window Functions Module', 'category' => 'Courses', 'xp' => 45, 'time' => 'Yesterday, 4:15 PM', 'impact' => '+2.0% Readiness'],
        ['id' => 'act_103', 'title' => 'Verified MSBTE Academic Credential via DigiLocker', 'category' => 'Govt Verification', 'xp' => 50, 'time' => '2 days ago', 'impact' => '+2.5% Readiness'],
        ['id' => 'act_104', 'title' => 'Skill Gap Diagnostic Retest (Closed 3 Priority Gaps)', 'category' => 'Diagnostics', 'xp' => 60, 'time' => '3 days ago', 'impact' => '+3.0% Readiness']
    ]
];

// Read or initialize state
$state = $defaultState;
if (file_exists($pointsFile)) {
    $saved = json_decode(file_get_contents($pointsFile), true);
    if (is_array($saved) && isset($saved['totalXp'])) {
        $state = array_merge($defaultState, $saved);
    }
}

// Check for authenticated user session via JWT cookie or Authorization header
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = '';
if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    $token = $matches[1];
} elseif (!empty($_COOKIE['skillpulse_access_token'])) {
    $token = $_COOKIE['skillpulse_access_token'];
}

$activeUserId = 'usr_student_demo';
$authUser = !empty($token) ? verify_jwt_token($token) : null;
if ($authUser && !empty($authUser['name'])) {
    $state['candidateName'] = $authUser['name'];
    if (!empty($authUser['sub'])) {
        $state['userId'] = $authUser['sub'];
        $activeUserId = $authUser['sub'];
    }
    if (!empty($authUser['role'])) {
        $state['targetRole'] = ($authUser['role'] === 'student') ? 'Data Analyst / TVET Candidate' : (ucfirst($authUser['role']) . ' Professional');
    }
}

// Sync with Supabase Cloud if available
if (supabase_is_configured()) {
    $sbProf = supabase_rest_request('user_profiles', 'GET', null, [
        'select' => '*',
        'user_id' => 'eq.' . $activeUserId,
        'limit' => 1
    ], true);

    // Fallback to baseline profile if new user profile has not been customized yet
    if ((!$sbProf['success'] || empty($sbProf['data'][0])) && $activeUserId !== 'usr_student_demo') {
        $sbProf = supabase_rest_request('user_profiles', 'GET', null, [
            'select' => '*',
            'user_id' => 'eq.usr_student_demo',
            'limit' => 1
        ], true);
    }

    if ($sbProf['success'] && !empty($sbProf['data'][0])) {
        $row = $sbProf['data'][0];
        if (isset($row['total_xp'])) {
            $state['totalXp'] = (int)$row['total_xp'];
        }
        if (isset($row['readiness_score'])) {
            $state['readinessScore'] = (float)$row['readiness_score'];
        }
        if (isset($row['current_level'])) {
            $state['currentLevel'] = (int)$row['current_level'];
        }
        if (!empty($row['tier'])) {
            $state['tier'] = $row['tier'];
        }
        if (!empty($row['level_title'])) {
            $state['levelTitle'] = $row['level_title'];
        }
    }
}

// Handle GET: Return point metrics
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') {
    echo json_encode([
        'success' => true,
        'data' => $state
    ], JSON_PRETTY_PRINT);
    exit;
}

// Handle POST: Add new activity points
$raw = file_get_contents('php://input');
$input = json_decode($raw, true) ?? $_POST ?? [];

$actionType = $input['actionType'] ?? 'practice_challenge';
$awardedXp = 0;
$title = '';
$category = '';
$readinessBoost = 0.5;

switch ($actionType) {
    case 'practice_challenge':
        $awardedXp = 30;
        $title = 'Solved LeetCode-style Practice Arena Problem';
        $category = 'Practice Arena';
        $state['dimensions']['practice']['xp'] += $awardedXp;
        $state['dimensions']['practice']['items'] += 1;
        $readinessBoost = 1.0;
        break;

    case 'course_module':
        $awardedXp = 45;
        $title = 'Completed Bridging Course Module Capstone';
        $category = 'Courses';
        $state['dimensions']['courses']['xp'] += $awardedXp;
        $state['dimensions']['courses']['items'] += 1;
        $readinessBoost = 1.5;
        break;

    case 'diagnostic_retest':
        $awardedXp = 35;
        $title = 'Executed Real-Time Skill Gap Diagnostic Retest';
        $category = 'Diagnostics';
        $state['dimensions']['diagnostics']['xp'] += $awardedXp;
        $state['dimensions']['diagnostics']['items'] += 1;
        $readinessBoost = 1.2;
        break;

    case 'digilocker_sync':
        $awardedXp = 50;
        $title = 'Authenticated Trade Certificate via DigiLocker ADV';
        $category = 'Govt Verification';
        $state['dimensions']['verification']['xp'] += $awardedXp;
        $state['dimensions']['verification']['items'] += 1;
        $readinessBoost = 2.0;
        break;

    default:
        $awardedXp = 20;
        $title = 'Logged Daily TVET Micro-Learning Action';
        $category = 'Practice Arena';
        $state['dimensions']['practice']['xp'] += $awardedXp;
        break;
}

// Update total XP and readiness score
$state['totalXp'] += $awardedXp;
$state['readinessScore'] = min(98, round($state['readinessScore'] + $readinessBoost, 1));

// Check for level up
if ($state['totalXp'] >= $state['nextLevelXp']) {
    $state['currentLevel'] += 1;
    $state['nextLevelXp'] += 500;
    if ($state['currentLevel'] >= 5) {
        $state['tier'] = 'Diamond (Industry Master)';
        $state['tierColor'] = '#06B6D4';
        $state['levelTitle'] = 'Master Industry Specialist';
    }
}

// Prepend to ledger
$newLedgerItem = [
    'id' => 'act_' . time() . '_' . rand(100, 999),
    'title' => $title,
    'category' => $category,
    'xp' => $awardedXp,
    'time' => 'Just now (' . date('h:i A') . ')',
    'impact' => '+' . $readinessBoost . '% Readiness'
];
array_unshift($state['activityLedger'], $newLedgerItem);
if (count($state['activityLedger']) > 20) {
    $state['activityLedger'] = array_slice($state['activityLedger'], 0, 20);
}

// Update current week's XP
$state['weeklyImprovement'][3]['xp'] += $awardedXp;
$state['weeklyImprovement'][3]['readiness'] = $state['readinessScore'];

// Save to JSON
@file_put_contents($pointsFile, json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// Log security audit for CERT-In
log_security_event('USER_EARNED_ACTIVITY_XP', 'aditya.patil@example.gov.in', 'SUCCESS', [
    'awardedXp' => $awardedXp,
    'newTotalXp' => $state['totalXp'],
    'action' => $actionType
]);

echo json_encode([
    'success' => true,
    'message' => 'Points awarded! +' . $awardedXp . ' XP logged to candidate profile.',
    'newActivity' => $newLedgerItem,
    'data' => $state
], JSON_PRETTY_PRINT);
