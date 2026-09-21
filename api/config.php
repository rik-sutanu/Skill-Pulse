<?php
/**
 * Safe Public Configuration API for SkillPulse Frontend
 * Exposes ONLY public/anon client keys (Supabase URL, Anon Key, Tawk.to Property ID).
 * Never exposes secret credentials (e.g. Service Role Keys, SMTP Passwords).
 */

require_once __DIR__ . '/../config/supabase.php';

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$supabaseUrl = getenv('SUPABASE_URL') ?: ($_ENV['SUPABASE_URL'] ?? '');
$supabaseAnonKey = getenv('SUPABASE_ANON_KEY') ?: ($_ENV['SUPABASE_ANON_KEY'] ?? '');
$tawktoProp = getenv('TAWKTO_PROPERTY_ID') ?: ($_ENV['TAWKTO_PROPERTY_ID'] ?? '');
$tawktoWidget = getenv('TAWKTO_WIDGET_ID') ?: ($_ENV['TAWKTO_WIDGET_ID'] ?? 'default');

$isConfigured = supabase_is_configured();
$hasTawkto = (!empty($tawktoProp) && strpos($tawktoProp, 'your-tawkto') === false);

echo json_encode([
    'success' => true,
    'supabase' => [
        'configured' => $isConfigured,
        'url' => $isConfigured ? $supabaseUrl : '',
        'anonKey' => $isConfigured ? $supabaseAnonKey : ''
    ],
    'tawkto' => [
        'enabled' => $hasTawkto,
        'propertyId' => $hasTawkto ? $tawktoProp : '',
        'widgetId' => $hasTawkto ? $tawktoWidget : 'default'
    ],
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
