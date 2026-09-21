<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../backend/security.php';
require_once __DIR__ . '/../config/supabase.php';

apply_government_security_headers();

$email = trim($_GET['email'] ?? '');
$limit = min(50, max(1, (int)($_GET['limit'] ?? 20)));

// Fetch enrollments from Supabase Cloud public.enrollments with local fallback
$enrollments = supabase_get_enrollments($email, $limit);

echo json_encode([
    'success' => true,
    'total' => count($enrollments),
    'source' => supabase_is_configured() ? 'supabase_cloud' : 'local_json',
    'enrollments' => $enrollments,
    'timestamp' => date('c')
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
