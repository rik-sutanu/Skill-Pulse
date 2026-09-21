<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../backend/data.php';
$data = getSkillPulseData();

echo json_encode([
    'success' => true,
    'total_roles' => count($data['JOB_ROLES'] ?? []),
    'roles' => $data['JOB_ROLES'] ?? [],
    'industries' => $data['INDUSTRIES'] ?? [],
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
