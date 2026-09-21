<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../backend/data.php';
require_once __DIR__ . '/../config/supabase.php';

$data = getSkillPulseData();
$govtMetrics = $data['MAHARASHTRA_GOVT_METRICS'] ?? [];
$districts = $data['MAHARASHTRA_DISTRICTS'] ?? [];

// Fetch live district telemetry from Supabase
if (supabase_is_configured()) {
    $sbRes = supabase_rest_request('district_analytics', 'GET', null, ['select' => '*'], false);
    if ($sbRes['success'] && is_array($sbRes['data']) && count($sbRes['data']) > 0) {
        $sbMap = [];
        foreach ($sbRes['data'] as $row) {
            $sbMap[strtolower($row['district_name'])] = $row;
        }
        foreach ($districts as &$d) {
            $nameKey = strtolower($d['name'] ?? '');
            if (isset($sbMap[$nameKey])) {
                $m = $sbMap[$nameKey];
                $d['registered_itis'] = $m['registered_itis'] ?? ($d['registered_itis'] ?? 0);
                $d['pmkvy_trained'] = $m['pmkvy_trained'] ?? ($d['pmkvy_trained'] ?? 0);
                $d['ncs_vacancies'] = $m['ncs_vacancies'] ?? ($d['ncs_vacancies'] ?? 0);
                $d['placement_ratio'] = $m['placement_ratio'] ?? ($d['placement_ratio'] ?? 0);
                if (!empty($m['top_demanded_skills'])) {
                    $d['topSkills'] = is_string($m['top_demanded_skills']) ? json_decode($m['top_demanded_skills'], true) : $m['top_demanded_skills'];
                }
            }
        }
        unset($d);
    }
}

echo json_encode([
    'success' => true,
    'state' => 'Maharashtra',
    'governmentMetrics' => $govtMetrics,
    'districts' => $districts,
    'portals' => $data['GOVT_PORTALS'] ?? [],
    'timestamp' => date('c')
], JSON_PRETTY_PRINT);
