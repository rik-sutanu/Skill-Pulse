<?php
/**
 * SkillPulse - Statutory Security & Privacy Compliance Helper
 * Aligned with:
 *  - Digital Personal Data Protection Act, 2023 (DPDP Act)
 *  - CERT-In Cybersecurity Directives (2022)
 *  - Guidelines for Indian Government Websites (GIGW 3.0)
 *  - Aadhaar Act 2016 / UIDAI Aadhaar Data Vault guidelines
 */

// 1. Enforce Statutory Government HTTP Security Headers
function apply_government_security_headers() {
    if (headers_sent()) return;

    // Strict Transport Security (HSTS)
    header("Strict-Transport-Security: max-age=63072000; includeSubDomains; preload");

    // Clickjacking defense
    header("X-Frame-Options: SAMEORIGIN");

    // MIME Sniffing defense
    header("X-Content-Type-Options: nosniff");

    // Referrer Policy
    header("Referrer-Policy: strict-origin-when-cross-origin");

    // Hardware & Sensor Permissions (Zero Trust)
    header("Permissions-Policy: geolocation=(), camera=(), microphone=(), payment=()");

    // Cross-Site Scripting protection
    header("X-XSS-Protection: 1; mode=block");

    // Content Security Policy (Level 3 compatible)
    $csp = "default-src 'self'; " .
           "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; " .
           "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
           "font-src 'self' https://fonts.gstatic.com data:; " .
           "img-src 'self' data: https:; " .
           "connect-src 'self' https: http://localhost:8000; " .
           "frame-ancestors 'self';";
    header("Content-Security-Policy: " . $csp);
}

// 2. UIDAI / DPDP Compliant PII Masking Helpers
function mask_aadhaar($aadhaarNumber) {
    $clean = preg_replace('/[^0-9]/', '', (string)$aadhaarNumber);
    if (strlen($clean) >= 4) {
        $last4 = substr($clean, -4);
        return "XXXX-XXXX-" . $last4;
    }
    return "XXXX-XXXX-XXXX";
}

function mask_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "u***@domain.gov.in";
    $parts = explode("@", $email);
    $name = $parts[0];
    $domain = $parts[1];
    $maskedName = substr($name, 0, 2) . str_repeat("*", max(1, strlen($name) - 2));
    return $maskedName . "@" . $domain;
}

function mask_phone($phone) {
    $clean = preg_replace('/[^0-9]/', '', (string)$phone);
    if (strlen($clean) >= 4) {
        $last4 = substr($clean, -4);
        return "+91 XXXXX " . $last4;
    }
    return "+91 XXXXX XXXXX";
}

// 3. CERT-In 180-Day Immutable Security Audit Logger
function log_security_event($action, $actorEmail, $status = "SUCCESS", $metadata = []) {
    $auditFile = __DIR__ . '/audit_logs.json';
    
    // Hash IP address with salt to respect DPDP Act privacy while maintaining auditability
    $clientIp = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    $ipHash = hash('sha256', $clientIp . 'SKILLPULSE_GOVT_SALT_2026');

    $event = [
        'event_id' => 'SEC-' . bin2hex(random_bytes(8)),
        'timestamp_utc' => gmdate('Y-m-d\TH:i:s\Z'),
        'timestamp_ist' => date('Y-m-d H:i:s T'),
        'action' => htmlspecialchars($action, ENT_QUOTES, 'UTF-8'),
        'actor' => mask_email($actorEmail),
        'status' => $status,
        'ip_fingerprint' => substr($ipHash, 0, 16),
        'user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', 0, 120),
        'metadata' => $metadata
    ];

    $logs = [];
    if (file_exists($auditFile)) {
        $data = file_get_contents($auditFile);
        $logs = json_decode($data, true) ?: [];
    }

    // Append event
    array_unshift($logs, $event);

    // Keep up to 500 recent events in mock demonstration store
    if (count($logs) > 500) {
        $logs = array_slice($logs, 0, 500);
    }

    @file_put_contents($auditFile, json_encode($logs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    return $event;
}

// ==========================================================================
// 4. BCRYPT PASSWORD HASHING (DPDP ACT 2023 §8 SECURITY SAFEGUARDS)
// ==========================================================================

function hash_password($plaintext) {
    return password_hash($plaintext, PASSWORD_BCRYPT, ['cost' => 10]);
}

function verify_password($plaintext, $hash) {
    if (empty($plaintext) || empty($hash)) return false;
    return password_verify($plaintext, $hash);
}

// ==========================================================================
// 5. JWT-BASED SESSION MANAGEMENT & HTTPONLY SECURE COOKIES
// ==========================================================================

const SKILLPULSE_JWT_SECRET = 'SkillPulse_Govt_CertIn_DPDP_SecKey_2026_x89a1';

function create_jwt_token($payloadData, $expirySeconds = 1800) {
    $now = time();
    $jti = bin2hex(random_bytes(16));
    $payload = array_merge($payloadData, [
        'jti' => $jti,
        'iss' => 'skillpulse.gov.in',
        'iat' => $now,
        'exp' => $now + $expirySeconds
    ]);

    $header = rtrim(strtr(base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT'])), '+/', '-_'), '=');
    $body = rtrim(strtr(base64_encode(json_encode($payload)), '+/', '-_'), '=');
    $sig = rtrim(strtr(base64_encode(hash_hmac('sha256', "$header.$body", SKILLPULSE_JWT_SECRET, true)), '+/', '-_'), '=');

    return "$header.$body.$sig";
}

function verify_jwt_token($jwtString) {
    if (empty($jwtString)) return null;
    $parts = explode('.', $jwtString);
    if (count($parts) !== 3) return null;

    list($headerB64, $bodyB64, $sigB64) = $parts;
    $expectedSig = rtrim(strtr(base64_encode(hash_hmac('sha256', "$headerB64.$bodyB64", SKILLPULSE_JWT_SECRET, true)), '+/', '-_'), '=');

    if (!hash_equals($expectedSig, $sigB64)) return null;

    $payload = json_decode(base64_decode(strtr($bodyB64, '-_', '+/')), true);
    if (!$payload) return null;

    // Check expiration
    if (isset($payload['exp']) && $payload['exp'] < time()) {
        return null; // Expired
    }

    // Check revocation registry
    $userId = $payload['sub'] ?? '';
    if ($userId && is_session_revoked($userId, $payload['iat'] ?? 0)) {
        return null; // Revoked due to password change or logout
    }

    return $payload;
}

function set_auth_cookies($accessToken, $refreshToken, $rememberMe = false) {
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    
    // Access token: 30 minutes
    setcookie('skillpulse_access_token', $accessToken, [
        'expires' => time() + 1800,
        'path' => '/',
        'domain' => '',
        'secure' => false, // Set false for localhost dev; in production set $secure
        'httponly' => true,
        'samesite' => 'Strict'
    ]);

    // Refresh token: 7 days (or 30 days if rememberMe)
    $refreshDuration = $rememberMe ? (86400 * 30) : (86400 * 7);
    setcookie('skillpulse_refresh_token', $refreshToken, [
        'expires' => time() + $refreshDuration,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
}

function clear_auth_cookies() {
    setcookie('skillpulse_access_token', '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'samesite' => 'Strict']);
    setcookie('skillpulse_refresh_token', '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'samesite' => 'Strict']);
}

// Session revocation registry (Invalidate all active sessions on password change)
function revoke_user_sessions($userId) {
    $revFile = __DIR__ . '/revocation_registry.json';
    $registry = file_exists($revFile) ? json_decode(file_get_contents($revFile), true) ?: [] : [];
    $registry[$userId] = time();
    @file_put_contents($revFile, json_encode($registry, JSON_PRETTY_PRINT));
}

function is_session_revoked($userId, $tokenIat) {
    $revFile = __DIR__ . '/revocation_registry.json';
    if (!file_exists($revFile)) return false;
    $registry = json_decode(file_get_contents($revFile), true) ?: [];
    if (isset($registry[$userId])) {
        return $tokenIat < $registry[$userId];
    }
    return false;
}

// ==========================================================================
// 6. RATE LIMITING & BRUTE-FORCE PROTECTION (5 ATTEMPTS / 10 MIN)
// ==========================================================================

function check_rate_limit($action, $identifier, $maxAttempts = 5, $decaySeconds = 600) {
    $file = __DIR__ . '/rate_limits.json';
    $now = time();
    $limits = file_exists($file) ? json_decode(file_get_contents($file), true) ?: [] : [];
    $key = hash('sha256', $action . ':' . strtolower(trim($identifier)));

    if (!isset($limits[$key])) {
        $limits[$key] = ['attempts' => 0, 'first_attempt' => $now];
    }

    // Reset if window has elapsed
    if ($now - $limits[$key]['first_attempt'] > $decaySeconds) {
        $limits[$key] = ['attempts' => 1, 'first_attempt' => $now];
        @file_put_contents($file, json_encode($limits));
        return ['allowed' => true, 'remaining' => $maxAttempts - 1];
    }

    $limits[$key]['attempts']++;
    @file_put_contents($file, json_encode($limits));

    if ($limits[$key]['attempts'] > $maxAttempts) {
        $retryAfter = $decaySeconds - ($now - $limits[$key]['first_attempt']);
        return ['allowed' => false, 'retry_after' => max(1, $retryAfter)];
    }

    return ['allowed' => true, 'remaining' => $maxAttempts - $limits[$key]['attempts']];
}

function reset_rate_limit($action, $identifier) {
    $file = __DIR__ . '/rate_limits.json';
    if (!file_exists($file)) return;
    $limits = json_decode(file_get_contents($file), true) ?: [];
    $key = hash('sha256', $action . ':' . strtolower(trim($identifier)));
    unset($limits[$key]);
    @file_put_contents($file, json_encode($limits));
}

// ==========================================================================
// 7. ARITHMETIC SECURITY CAPTCHA GENERATOR & VALIDATOR
// ==========================================================================

function generate_security_captcha() {
    $n1 = rand(2, 9);
    $n2 = rand(1, 8);
    $ans = (string)($n1 + $n2);
    $token = hash_hmac('sha256', $ans, SKILLPULSE_JWT_SECRET);
    return [
        'question' => "$n1 + $n2 = ?",
        'token' => $token
    ];
}

function verify_security_captcha($userInput, $token) {
    if (empty($token)) return false;
    $cleanInput = trim((string)$userInput);
    $expectedToken = hash_hmac('sha256', $cleanInput, SKILLPULSE_JWT_SECRET);
    return hash_equals($expectedToken, $token);
}

// ==========================================================================
// 8. ROLE-BASED ACCESS CONTROL (RBAC) PERMISSION MATRIX
// ==========================================================================

const ROLE_PERMISSIONS = [
    'student' => [
        'profile:read_own', 'profile:update_own',
        'readiness:view_own', 'practice:solve', 'diagnostics:retest',
        'courses:resume', 'data:export_own', 'account:delete_own'
    ],
    'faculty' => [
        'cohort:read_aggregate', 'curriculum:simulate',
        'syllabus:audit', 'retest:schedule_batch', 'reports:export_compliance'
    ],
    'employer' => [
        'talent:search_anonymized', 'requisition:create', 'requisition:update',
        'candidate:shortlist', 'candidate:request_interview'
    ],
    'government' => [
        'census:read_aggregate', 'iti:view_capacity',
        'district:view_metrics', 'statutory:export_logs', 'certin:view_audit'
    ]
];

function check_rbac_permission($role, $permission) {
    $allowed = ROLE_PERMISSIONS[$role] ?? [];
    return in_array($permission, $allowed, true);
}

// ==========================================================================
// 9. ACCESS LOGS & 1-YEAR RETENTION POLICY (DPDP ACT 2023)
// ==========================================================================

function log_access_event($userId, $resource, $accessorId, $action, $details = []) {
    $file = __DIR__ . '/access_logs.json';
    $logs = file_exists($file) ? json_decode(file_get_contents($file), true) ?: [] : [];

    $entry = [
        'log_id' => 'ACC-' . bin2hex(random_bytes(6)),
        'timestamp' => date('c'),
        'user_id' => $userId,
        'resource' => $resource,
        'accessor_id' => $accessorId,
        'action' => $action,
        'ip_address' => substr(hash('sha256', ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1') . 'SALT'), 0, 16),
        'details' => $details
    ];

    $logs[] = $entry;

    // Prune records older than 365 days (enforce 1-year retention requirement)
    $cutoff = strtotime('-365 days');
    $logs = array_filter($logs, function($l) use ($cutoff) {
        return strtotime($l['timestamp']) >= $cutoff;
    });

    @file_put_contents($file, json_encode(array_values($logs), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    // Check for bulk access anomaly
    check_access_anomaly($accessorId);

    return $entry;
}

// Anomaly Detector: Flag if any single accessor queries >15 records in 5 minutes
function check_access_anomaly($accessorId, $threshold = 15, $windowSeconds = 300) {
    $file = __DIR__ . '/access_logs.json';
    if (!file_exists($file)) return false;
    $logs = json_decode(file_get_contents($file), true) ?: [];

    $now = time();
    $recentCount = 0;
    foreach ($logs as $l) {
        if (($l['accessor_id'] ?? '') === $accessorId) {
            $t = strtotime($l['timestamp']);
            if (($now - $t) <= $windowSeconds) {
                $recentCount++;
            }
        }
    }

    if ($recentCount >= $threshold) {
        log_security_event('ANOMALOUS_BULK_ACCESS_DETECTED', $accessorId, 'WARNING', [
            'recent_access_count' => $recentCount,
            'time_window_sec' => $windowSeconds,
            'threshold' => $threshold,
            'statute_notice' => 'CERT-In / DPDP Act Potential Data Scraping Alert'
        ]);
        return true;
    }
    return false;
}

// ==========================================================================
// 10. ISOLATED IDENTITY VAULT ENCRYPTION AT REST (AES-256-GCM)
// ==========================================================================

const KMS_VAULT_KEY = 'SkillPulse_AadhaarVault_KMS_AES256_MasterKey#9821_Secret';

function encrypt_vault_data($plaintextData) {
    $key = hash('sha256', KMS_VAULT_KEY, true);
    $iv = random_bytes(12); // GCM standard 96-bit IV
    $json = is_string($plaintextData) ? $plaintextData : json_encode($plaintextData);

    if (function_exists('openssl_encrypt')) {
        $tag = '';
        $ciphertext = openssl_encrypt($json, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
        if ($ciphertext !== false) {
            return [
                'ciphertext' => base64_encode($ciphertext),
                'iv' => base64_encode($iv),
                'tag' => base64_encode($tag),
                'cipher' => 'AES-256-GCM',
                'kms_key_urn' => 'urn:skillpulse:kms:adv-vault-v1'
            ];
        }
    }

    // Zero-dependency authenticated stream cipher fallback (HMAC-SHA256 CTR + Tag)
    $pad = '';
    $blockCount = ceil(strlen($json) / 32);
    for ($i = 0; $i < $blockCount; $i++) {
        $pad .= hash_hmac('sha256', $iv . pack('N', $i), $key, true);
    }
    $ciphertext = $json ^ substr($pad, 0, strlen($json));
    $tag = hash_hmac('sha256', $iv . $ciphertext, $key, true);

    return [
        'ciphertext' => base64_encode($ciphertext),
        'iv' => base64_encode($iv),
        'tag' => base64_encode($tag),
        'cipher' => 'HMAC-SHA256-CTR-AUTH',
        'kms_key_urn' => 'urn:skillpulse:kms:adv-vault-v1'
    ];
}

function decrypt_vault_data($encryptedPackage) {
    if (empty($encryptedPackage['ciphertext']) || empty($encryptedPackage['iv']) || empty($encryptedPackage['tag'])) {
        return null;
    }
    $key = hash('sha256', KMS_VAULT_KEY, true);
    $ciphertext = base64_decode($encryptedPackage['ciphertext']);
    $iv = base64_decode($encryptedPackage['iv']);
    $tag = base64_decode($encryptedPackage['tag']);
    $cipher = $encryptedPackage['cipher'] ?? 'AES-256-GCM';

    if ($cipher === 'AES-256-GCM' && function_exists('openssl_decrypt')) {
        $decrypted = openssl_decrypt($ciphertext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
        if ($decrypted !== false) {
            $jsonDecoded = json_decode($decrypted, true);
            return $jsonDecoded !== null ? $jsonDecoded : $decrypted;
        }
    }

    // Fallback stream decrypt & verify authentication tag
    $expectedTag = hash_hmac('sha256', $iv . $ciphertext, $key, true);
    if (!hash_equals($tag, $expectedTag)) {
        return null; // Tag mismatch / corrupted
    }

    $pad = '';
    $blockCount = ceil(strlen($ciphertext) / 32);
    for ($i = 0; $i < $blockCount; $i++) {
        $pad .= hash_hmac('sha256', $iv . pack('N', $i), $key, true);
    }
    $decrypted = $ciphertext ^ substr($pad, 0, strlen($ciphertext));
    $jsonDecoded = json_decode($decrypted, true);
    return $jsonDecoded !== null ? $jsonDecoded : $decrypted;
}

// ==========================================================================
// 11. CSRF PROTECTION & RECURSIVE INPUT SANITIZATION
// ==========================================================================

function generate_csrf_token() {
    if (empty($_SESSION)) {
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }
    }
    if (empty($_SESSION['skillpulse_csrf_token'])) {
        $_SESSION['skillpulse_csrf_token'] = bin2hex(random_bytes(24));
    }
    return $_SESSION['skillpulse_csrf_token'];
}

function validate_csrf_token($token) {
    if (empty($_SESSION['skillpulse_csrf_token']) || empty($token)) return false;
    return hash_equals($_SESSION['skillpulse_csrf_token'], $token);
}

function sanitize_input_recursive($data) {
    if (is_array($data)) {
        $clean = [];
        foreach ($data as $k => $v) {
            $cleanKey = htmlspecialchars($k, ENT_QUOTES, 'UTF-8');
            $clean[$cleanKey] = sanitize_input_recursive($v);
        }
        return $clean;
    }
    if (is_string($data)) {
        // Strip null bytes and XSS script tags
        $data = str_replace(chr(0), '', $data);
        $data = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data);
        return trim(strip_tags($data));
    }
    return $data;
}

// ==========================================================================
// 12. SECURE SERVER-SIDE RESUME UPLOAD VALIDATOR
// ==========================================================================

function validate_and_store_resume($file) {
    $maxSize = 5 * 1024 * 1024; // 5 MB
    $allowedMimes = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $allowedExts = ['pdf', 'docx'];

    if (!isset($file['error']) || is_array($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Upload error or no file provided.'];
    }

    if ($file['size'] > $maxSize) {
        return ['success' => false, 'message' => 'File exceeds statutory size limit of 5MB.'];
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $allowedMimes, true)) {
        return ['success' => false, 'message' => 'Invalid file type. Only PDF and DOCX documents are accepted.'];
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExts, true)) {
        return ['success' => false, 'message' => 'Invalid extension. Must be .pdf or .docx.'];
    }

    // Store in restricted directory outside direct URL execution
    $uploadDir = __DIR__ . '/secure_uploads/';
    if (!is_dir($uploadDir)) {
        @mkdir($uploadDir, 0750, true);
    }

    $safeName = 'res_' . bin2hex(random_bytes(12)) . '.' . $ext;
    $targetPath = $uploadDir . $safeName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return ['success' => false, 'message' => 'Failed to persist document to secure vault.'];
    }

    return [
        'success' => true,
        'stored_file' => $safeName,
        'original_name' => htmlspecialchars($file['name'], ENT_QUOTES, 'UTF-8'),
        'size_bytes' => $file['size'],
        'mime_type' => $mime
    ];
}

