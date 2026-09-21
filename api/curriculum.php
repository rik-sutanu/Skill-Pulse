<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$rawInput = file_get_contents('php://input');
$payload = json_decode($rawInput, true) ?? $_POST ?? [];

$baseScore = 75;
$selectedModules = $payload['modules'] ?? ['genai'];

// Module impact table
$moduleGains = [
    'genai' => 7,
    'cloud' => 5,
    'devops' => 4,
    'cyber' => 3
];

$additionalGain = 0;
$activeModules = [];

foreach ($selectedModules as $m) {
    if (isset($moduleGains[$m])) {
        $additionalGain += $moduleGains[$m];
        $activeModules[] = $m;
    }
}

$projectedScore = min(99, $baseScore + $additionalGain);

echo json_encode([
    'success' => true,
    'baseScore' => $baseScore,
    'projectedScore' => $projectedScore,
    'alignmentDelta' => $additionalGain,
    'activeModules' => $activeModules,
    'placementVelocity' => '+34%',
    'accreditationImpact' => 'NAAC / NBA Curriculum Innovation Approved',
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
