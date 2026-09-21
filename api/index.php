<?php
/**
 * SkillPulse Master Serverless Router & Page Dispatcher
 * Aligned with Vercel Serverless Architecture (vercel-php runtime)
 * 
 * Intercepts incoming web page requests (e.g. /auth.php, /courses.php, /)
 * and executes them with PHP runtime, ensuring HTML is rendered in browser
 * and raw .php files are NEVER served as binary downloads.
 */

$rawUri = $_SERVER['REQUEST_URI'] ?? '/';
$parsedPath = parse_url($rawUri, PHP_URL_PATH) ?: '/';
$clean = trim($parsedPath, '/');

// Remove any leading query or fragments
if (strpos($clean, '?') !== false) {
    $clean = substr($clean, 0, strpos($clean, '?'));
}

// 1. Root Homepage Request
if ($clean === '' || $clean === 'index' || $clean === 'index.php' || $clean === 'index.html') {
    chdir(__DIR__ . '/..');
    header('Content-Type: text/html; charset=utf-8');
    require __DIR__ . '/../index.php';
    exit;
}

// 2. Direct API request fallback (e.g. /api/auth.php, /api/districts.php)
if (strpos($clean, 'api/') === 0) {
    $apiRel = substr($clean, 4);
    $apiFile = __DIR__ . '/' . $apiRel;
    if (!file_exists($apiFile) && file_exists($apiFile . '.php')) {
        $apiFile .= '.php';
    }
    if (file_exists($apiFile) && is_file($apiFile)) {
        chdir(__DIR__);
        require $apiFile;
        exit;
    }
}

// 3. Platform Web Page Routes (e.g. auth.php, courses.php, dashboard.php)
$pageCandidate = $clean;

// Normalize .html requests to .php
if (substr($pageCandidate, -5) === '.html') {
    $pageCandidate = substr($pageCandidate, 0, -5) . '.php';
}

// Ensure .php extension if omitted
if (substr($pageCandidate, -4) !== '.php') {
    if (file_exists(__DIR__ . '/../' . $pageCandidate . '.php')) {
        $pageCandidate .= '.php';
    }
}

$pagePath = __DIR__ . '/../' . $pageCandidate;

if (file_exists($pagePath) && is_file($pagePath)) {
    chdir(__DIR__ . '/..');
    // Ensure default text/html header is sent unless page sets its own
    header('Content-Type: text/html; charset=utf-8');
    require $pagePath;
    exit;
}

// 4. Static root assets (e.g. favicon.ico, robots.txt)
$staticRootFile = __DIR__ . '/../' . $clean;
if (file_exists($staticRootFile) && is_file($staticRootFile)) {
    $ext = strtolower(pathinfo($staticRootFile, PATHINFO_EXTENSION));
    $mimes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'svg' => 'image/svg+xml',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'ico' => 'image/x-icon',
        'json' => 'application/json'
    ];
    $mime = $mimes[$ext] ?? 'text/plain';
    header('Content-Type: ' . $mime);
    readfile($staticRootFile);
    exit;
}

// 5. Friendly 404 Response (Never download unknown file)
http_response_code(404);
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Not Found | SkillPulse</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:var(--navy-50, #f8fafc);font-family:system-ui,sans-serif;">
  <div style="max-width:480px;background:#ffffff;padding:2.5rem;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,0.08);text-align:center;border:1px solid #e2e8f0;">
    <div style="font-size:3rem;margin-bottom:1rem;">🔍</div>
    <h1 style="font-size:1.5rem;font-weight:800;color:#0f172a;margin-bottom:0.5rem;">Page Not Found</h1>
    <p style="color:#64748b;font-size:0.9rem;margin-bottom:1.5rem;">The page you requested could not be located on the SkillPulse portal.</p>
    <a href="index.php" style="display:inline-block;padding:0.75rem 1.5rem;background:#0284c7;color:#ffffff;border-radius:8px;font-weight:700;text-decoration:none;">Return to Homepage</a>
  </div>
</body>
</html>
