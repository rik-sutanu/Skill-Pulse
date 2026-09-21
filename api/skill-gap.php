<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../backend/data.php';
$data = getSkillPulseData();
$roles = $data['JOB_ROLES'] ?? [];

$rawInput = file_get_contents('php://input');
$payload = json_decode($rawInput, true) ?? $_POST ?? [];

$roleId = $payload['roleId'] ?? $_GET['roleId'] ?? 'data-analyst';
$userSkills = $payload['skills'] ?? [];

// Find matching role
$selectedRole = null;
foreach ($roles as $r) {
    if ($r['id'] === $roleId) {
        $selectedRole = $r;
        break;
    }
}

if (!$selectedRole && !empty($roles)) {
    $selectedRole = $roles[0];
}

$userSkillMap = [];
foreach ($userSkills as $s) {
    $userSkillMap[strtolower(trim($s))] = true;
}

$totalWeight = 0;
$earned = 0;
$matched = [];
$missing = [];

foreach ($selectedRole['requiredSkills'] as $req) {
    $totalWeight += $req['weight'];
    $skillNameLower = strtolower(trim($req['name']));
    if (isset($userSkillMap[$skillNameLower])) {
        $earned += $req['weight'];
        $matched[] = $req;
    } else {
        $missing[] = $req;
    }
}

$percentage = $totalWeight > 0 ? round(($earned / $totalWeight) * 100) : 0;

$status = 'Foundational Level';
if ($percentage >= 80) {
    $status = 'High Industry Match (Direct Interview Ready)';
} elseif ($percentage >= 50) {
    $status = 'Moderate Alignment (Bridging Courses Recommended)';
}

echo json_encode([
    'success' => true,
    'role' => [
        'id' => $selectedRole['id'],
        'title' => $selectedRole['title'],
        'salaryRange' => $selectedRole['salaryRange']
    ],
    'score' => $percentage,
    'status' => $status,
    'earnedWeight' => $earned,
    'totalWeight' => $totalWeight,
    'matchedSkills' => $matched,
    'missingSkills' => $missing,
    'recommendedPath' => $selectedRole['recommendedPath'] ?? [],
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
