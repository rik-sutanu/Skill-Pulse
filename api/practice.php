<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../backend/data.php';
require_once __DIR__ . '/../config/supabase.php';

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// --------------------------------------------------------------------------
// POST: Submit a Practice Attempt (Record score & award XP)
// --------------------------------------------------------------------------
if ($method === 'POST') {
    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true) ?: $_POST;

    $questionId = trim($input['question_id'] ?? 'q1');
    $role = trim($input['role'] ?? 'general');
    $selectedOption = (int)($input['selected_option'] ?? 0);
    $isCorrect = !empty($input['is_correct']);
    $scoreDelta = (int)($input['score_delta'] ?? ($isCorrect ? 15 : 5));
    $userId = trim($input['user_id'] ?? 'usr_student_demo');

    // 1. Persist attempt in Supabase public.practice_attempts
    if (supabase_is_configured()) {
        supabase_save_practice_attempt([
            'user_id' => $userId,
            'question_id' => $questionId,
            'role' => $role,
            'selected_option' => $selectedOption,
            'is_correct' => $isCorrect,
            'score_delta' => $scoreDelta
        ]);

        // Award XP to user profile
        supabase_award_xp($userId, $scoreDelta, 'practice');
    }

    // 2. Local fallback XP in user_points.json
    $pointsFile = __DIR__ . '/../backend/user_points.json';
    if (file_exists($pointsFile)) {
        $pData = json_decode(file_get_contents($pointsFile), true) ?: [];
        if (!empty($pData)) {
            $pData['totalXp'] = ($pData['totalXp'] ?? 1340) + $scoreDelta;
            if (isset($pData['dimensions']['practice']['xp'])) {
                $pData['dimensions']['practice']['xp'] += $scoreDelta;
                $pData['dimensions']['practice']['items'] = ($pData['dimensions']['practice']['items'] ?? 0) + 1;
            }
            if (isset($pData['activityLedger'])) {
                array_unshift($pData['activityLedger'], [
                    'id' => 'act_' . time(),
                    'title' => "Completed Practice Problem: {$questionId}",
                    'category' => 'Practice Arena',
                    'xp' => $scoreDelta,
                    'time' => 'Just now',
                    'impact' => $isCorrect ? 'Correct solution verified' : 'Practice attempt recorded'
                ]);
            }
            @file_put_contents($pointsFile, json_encode($pData, JSON_PRETTY_PRINT));
        }
    }

    echo json_encode([
        'success' => true,
        'message' => 'Practice attempt recorded successfully.',
        'xpAwarded' => $scoreDelta,
        'isCorrect' => $isCorrect,
        'timestamp' => date('c')
    ], JSON_PRETTY_PRINT);
    exit;
}

// --------------------------------------------------------------------------
// GET: Fetch Practice Questions (from Supabase + local catalog)
// --------------------------------------------------------------------------
$data = getSkillPulseData();
$localQuestions = $data['PRACTICE_QUESTIONS'] ?? [];
$roleFilter = $_GET['role'] ?? 'all';

$supabaseQuestions = [];
if (supabase_is_configured()) {
    $sbRes = supabase_rest_request('practice_questions', 'GET', null, ['select' => '*'], false);
    if ($sbRes['success'] && is_array($sbRes['data']) && count($sbRes['data']) > 0) {
        $supabaseQuestions = $sbRes['data'];
    }
}

// Merge or use Supabase questions
$allQuestions = $localQuestions;
if (!empty($supabaseQuestions)) {
    // Map Supabase MCQ questions to compatible format if needed
    foreach ($supabaseQuestions as $sq) {
        $exists = false;
        foreach ($allQuestions as $lq) {
            if (($lq['id'] ?? '') === $sq['id']) {
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            $allQuestions[] = [
                'id' => $sq['id'],
                'title' => $sq['question_text'],
                'difficulty' => $sq['difficulty'] ?? 'Medium',
                'relatedSkill' => ucfirst($sq['role'] ?? 'General'),
                'skillCategory' => 'TVET Multiple Choice',
                'companies' => [$sq['company'] ?? 'TCS'],
                'roles' => [$sq['role'] ?? 'all'],
                'options' => is_string($sq['options']) ? json_decode($sq['options'], true) : $sq['options'],
                'correctAnswer' => $sq['correct_answer'] ?? 0,
                'explanation' => $sq['explanation'] ?? '',
                'points' => $sq['points'] ?? 10
            ];
        }
    }
}

if ($roleFilter !== 'all' && !empty($roleFilter)) {
    $allQuestions = array_values(array_filter($allQuestions, function($q) use ($roleFilter) {
        $qRole = $q['role'] ?? '';
        $qRoles = $q['roles'] ?? [];
        if (is_array($qRoles)) {
            foreach ($qRoles as $r) {
                if (strcasecmp($r, $roleFilter) === 0) return true;
            }
        }
        return strcasecmp($qRole, $roleFilter) === 0;
    }));
}

echo json_encode([
    'success' => true,
    'total' => count($allQuestions),
    'filter' => $roleFilter,
    'source' => !empty($supabaseQuestions) ? 'supabase_plus_local' : 'local_catalog',
    'questions' => $allQuestions,
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
