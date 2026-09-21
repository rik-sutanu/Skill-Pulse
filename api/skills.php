<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../backend/data.php';
$data = getSkillPulseData();

$skills = $data['SKILL_DEMAND_DATA'] ?? [];
$emerging = $data['EMERGING_SKILLS'] ?? [];

echo json_encode([
    'success' => true,
    'total_skills' => count($skills),
    'skills' => $skills,
    'emerging' => $emerging,
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
