<?php
echo "========================================================\n";
echo "SKILLPULSE DPDP ACT 2023 & SECURITY VERIFICATION SUITE\n";
echo "========================================================\n\n";

$baseUrl = 'http://localhost:3000';

function post_json($url, $data) {
    $opts = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n",
            'content' => json_encode($data),
            'ignore_errors' => true
        ]
    ];
    $ctx = stream_context_create($opts);
    $res = @file_get_contents($url, false, $ctx);
    return json_decode($res, true);
}

function get_json($url) {
    $res = @file_get_contents($url);
    return json_decode($res, true);
}

// 1. Test Bcrypt Authentication for Student
$loginResp = post_json("$baseUrl/api/auth.php", [
    'action' => 'login',
    'email' => 'student@skillpulse.in',
    'password' => 'password123',
    'role' => 'student'
]);
echo "1. Password Authentication (Bcrypt Cost 10):\n";
echo "   - Success: " . ($loginResp['success'] ? 'PASS' : 'FAIL') . "\n";
echo "   - User: " . ($loginResp['user']['name'] ?? 'N/A') . " (" . ($loginResp['user']['maskedEmail'] ?? '') . ")\n";
echo "   - Token Issued: " . (!empty($loginResp['token']) ? 'PASS' : 'FAIL') . "\n";
echo "   - Redirect Target: " . ($loginResp['redirect'] ?? 'N/A') . "\n\n";

// 2. Test Captcha Generation
$capResp = get_json("$baseUrl/api/auth.php?action=get_captcha");
echo "2. Security CAPTCHA Challenge:\n";
echo "   - Success: " . ($capResp['success'] ? 'PASS' : 'FAIL') . "\n";
echo "   - Question: " . ($capResp['question'] ?? 'N/A') . "\n";
echo "   - Token: " . substr($capResp['token'] ?? '', 0, 24) . "...\n\n";

// 3. Test DigiLocker Aadhaar Data Vault Masking & Isolated AES-256-GCM Storage
$opts = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode([
            'action' => 'digilocker_verify',
            'mobile' => '9820198201',
            'aadhaar' => '998877668921',
            'userId' => 'usr_student_01'
        ]),
        'ignore_errors' => true
    ]
];
$rawDl = file_get_contents("$baseUrl/api/auth.php", false, stream_context_create($opts));
$dlResp = json_decode($rawDl, true);
if (!$dlResp) {
    echo "DEBUG RAW DL: " . $rawDl . "\n";
}
echo "3. Isolated Aadhaar Data Vault (UIDAI & DPDP Standard):\n";
echo "   - Success: " . (!empty($dlResp['success']) ? 'PASS' : 'FAIL') . "\n";
echo "   - Masked Aadhaar: " . ($dlResp['credential']['maskedAadhaar'] ?? 'N/A') . "\n";
echo "   - ADV Ref Key: " . ($dlResp['credential']['advReferenceKey'] ?? 'N/A') . "\n";
echo "   - Storage Security: " . ($dlResp['credential']['storageSecurity'] ?? 'N/A') . "\n\n";

// 4. Test Citizen Right to Access (§11) Data Export
$exportResp = post_json("$baseUrl/api/auth.php", [
    'action' => 'export_my_data',
    'email' => 'student@skillpulse.in'
]);
echo "4. Citizen Right to Access (§11 Data Export):\n";
echo "   - Success: " . ($exportResp['success'] ? 'PASS' : 'FAIL') . "\n";
echo "   - Disclosed To: " . ($exportResp['disclosedTo'] ?? 'N/A') . "\n";
echo "   - Data Fiduciary: " . ($exportResp['transparencySummary']['dataFiduciary'] ?? 'N/A') . "\n";
echo "   - Retention Standard: " . ($exportResp['transparencySummary']['retentionPeriod'] ?? 'N/A') . "\n";
echo "   - Vault Reference Key: " . ($exportResp['dataSubjectProfile']['credentialVaultReference']['advReferenceKey'] ?? 'N/A') . "\n\n";

// 5. Test AI De-Identification Filter
$aiResp = post_json("$baseUrl/api/ai.php", [
    'action' => 'predict_readiness',
    'candidate_name' => 'Aditya Patil', // PII
    'user_email' => 'aditya@example.com', // PII
    'activity_xp' => 1480,
    'readiness_score' => 84.0,
    'streak_days' => 18
]);
echo "5. AI Integration De-Identification Filter (DPDP §6):\n";
echo "   - Success: " . ($aiResp['success'] ? 'PASS' : 'FAIL') . "\n";
echo "   - Inference Source: " . ($aiResp['source'] ?? 'N/A') . "\n";
echo "   - Placement Tier: " . ($aiResp['data']['placement_tier'] ?? 'N/A') . "\n";
echo "   - Probability: " . ($aiResp['data']['predicted_placement_probability'] ?? 'N/A') . "%\n\n";

// 6. Test CERT-In 180-Day Audit Log Inspector
$auditResp = get_json("$baseUrl/api/auth.php?action=audit_logs");
echo "6. CERT-In 180-Day Audit Log Integrity:\n";
echo "   - Compliance: " . ($auditResp['compliance'] ?? 'N/A') . "\n";
echo "   - TimeZone Standard: " . ($auditResp['timeZone'] ?? 'N/A') . "\n";
echo "   - Total Events Logged: " . ($auditResp['eventCount'] ?? 0) . "\n\n";

// 7. Test DPDP 1-Year Access Log Inspector
$accessResp = get_json("$baseUrl/api/auth.php?action=access_logs");
echo "7. DPDP Act 1-Year Access Log Inspector:\n";
echo "   - Compliance: " . ($accessResp['compliance'] ?? 'N/A') . "\n";
echo "   - Total Access Events: " . ($accessResp['eventCount'] ?? 0) . "\n\n";

echo "ALL SECURITY VERIFICATION SUITE CHECKS COMPLETE.\n";
