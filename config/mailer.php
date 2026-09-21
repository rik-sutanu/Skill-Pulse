<?php
/**
 * SkillPulse Mailer Service
 * Integrates PHPMailer for transactional email notifications.
 * Compliant with Indian DPDP Act 2023 and CERT-In security guidelines.
 */

// Load Composer autoloader if not already loaded
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    $autoloadPath = __DIR__ . '/../vendor/autoload.php';
    if (file_exists($autoloadPath)) {
        require_once $autoloadPath;
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailerException;

/**
 * Parses and loads environment variables from a .env file safely.
 * Does not overwrite existing environment variables.
 *
 * @param string $path Path to .env file
 * @return bool True if loaded, false otherwise
 */
function load_environment_file($path = null) {
    if ($path === null) {
        $path = __DIR__ . '/../.env';
    }
    if (!file_exists($path) || !is_readable($path)) {
        return false;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return false;
    }

    foreach ($lines as $line) {
        $line = trim($line);
        // Ignore comments and blank lines
        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }

        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            // Strip enclosing quotes if present
            if ((str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
                $value = substr($value, 1, -1);
            }

            if (!array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
                putenv("$name=$value");
            }
        }
    }
    return true;
}

// Automatically load .env on file inclusion
load_environment_file();

/**
 * Safely fetches an environment variable with a fallback.
 *
 * @param string $key Environment key
 * @param mixed $default Fallback value
 * @return mixed
 */
function get_mailer_env($key, $default = null) {
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    $val = getenv($key);
    if ($val !== false && $val !== '') {
        return $val;
    }
    return $default;
}

/**
 * Instantiates and configures a reusable PHPMailer object.
 *
 * @param bool $exceptions Enable PHPMailer exceptions
 * @return PHPMailer
 * @throws MailerException
 */
function create_mailer_client($exceptions = true) {
    if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
        throw new MailerException('PHPMailer class not found. Ensure vendor/autoload.php is loaded.');
    }

    $mail = new PHPMailer($exceptions);

    // Read SMTP settings from environment variables
    $host = get_mailer_env('MAIL_HOST', 'smtp.gmail.com');
    $port = (int) get_mailer_env('MAIL_PORT', 587);
    $username = get_mailer_env('MAIL_USERNAME', '');
    $password = get_mailer_env('MAIL_PASSWORD', '');
    $encryption = strtolower(get_mailer_env('MAIL_ENCRYPTION', 'tls'));
    $fromAddress = get_mailer_env('MAIL_FROM_ADDRESS', $username ?: 'no-reply@skillpulse.in');
    $fromName = get_mailer_env('MAIL_FROM_NAME', 'SkillPulse');

    // Server Configuration
    $mail->isSMTP();
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->CharSet = 'UTF-8';
    $mail->Timeout = 8; // 8-second timeout to avoid long blocking on slow networks

    // Security & Encryption configuration (Gmail / STARTTLS / SMTPS)
    if ($encryption === 'ssl' || $port === 465) {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($encryption === 'tls' || $port === 587) {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } else {
        $mail->SMTPSecure = false;
        $mail->SMTPAutoTLS = false;
    }

    // Authentication
    if (!empty($username) && !empty($password) && !str_contains($password, 'your-gmail-app-password')) {
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
    } else {
        // Disabled auth or missing/placeholder credentials
        $mail->SMTPAuth = false;
    }

    // Sender Identity
    $mail->setFrom($fromAddress, $fromName);

    return $mail;
}

/**
 * Checks if a login notification email was recently dispatched to prevent duplicates.
 *
 * @param string $recipientEmail
 * @param int $cooldownSeconds Cooldown window in seconds (default 15)
 * @return bool True if duplicate / on cooldown, false if permitted
 */
function is_duplicate_login_email($recipientEmail, $cooldownSeconds = 15) {
    if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
        @session_start();
    }

    $key = 'last_login_email_' . md5(strtolower(trim($recipientEmail)));
    $now = time();

    if (isset($_SESSION[$key]) && ($now - $_SESSION[$key]) < $cooldownSeconds) {
        return true;
    }

    $_SESSION[$key] = $now;
    return false;
}

/**
 * Sends a successful login security notification email via PHPMailer.
 * Never throws uncaught exceptions; returns an associative result array.
 *
 * @param string $recipientEmail User's verified email from database
 * @param string $recipientName User's full display name
 * @param array $context Additional context (ip, userAgent, role, timestamp)
 * @return array ['success' => bool, 'message' => string, 'simulated' => bool]
 */
function send_login_notification_email($recipientEmail, $recipientName = 'User', array $context = []) {
    $recipientEmail = trim($recipientEmail);
    if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
        return [
            'success' => false,
            'message' => 'Invalid or missing recipient email address.'
        ];
    }

    // Duplicate submission / page refresh guard
    if (is_duplicate_login_email($recipientEmail)) {
        return [
            'success' => true,
            'message' => 'Duplicate notification suppressed (cooldown active).',
            'suppressed' => true
        ];
    }

    $websiteName = get_mailer_env('MAIL_FROM_NAME', 'SkillPulse');
    $loginTime = $context['timestamp'] ?? date('F j, Y, g:i:s A T');
    $ipAddress = $context['ip'] ?? ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
    $userAgent = $context['userAgent'] ?? ($_SERVER['HTTP_USER_AGENT'] ?? 'Web Browser');
    $userRole = ucfirst($context['role'] ?? 'Candidate');

    // Check if real credentials are configured
    $password = get_mailer_env('MAIL_PASSWORD', '');
    $username = get_mailer_env('MAIL_USERNAME', '');
    $isPlaceholder = empty($password) || empty($username) || 
                     str_contains($password, 'your-gmail-app-password') || 
                     str_contains($username, 'your-email@gmail.com');

    // Build Email Body (HTML and Plain Text)
    $escapedName = htmlspecialchars($recipientName, ENT_QUOTES, 'UTF-8');
    $escapedEmail = htmlspecialchars($recipientEmail, ENT_QUOTES, 'UTF-8');
    $escapedTime = htmlspecialchars($loginTime, ENT_QUOTES, 'UTF-8');
    $escapedIp = htmlspecialchars($ipAddress, ENT_QUOTES, 'UTF-8');
    $escapedUserAgent = htmlspecialchars($userAgent, ENT_QUOTES, 'UTF-8');
    $escapedWebsite = htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8');

    $htmlBody = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Successful Login - {$escapedWebsite}</title>
  <style>
    body { margin: 0; padding: 0; background-color: #0b1120; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #e2e8f0; }
    .email-wrapper { width: 100%; background-color: #0b1120; padding: 32px 12px; box-sizing: border-box; }
    .email-card { max-width: 580px; margin: 0 auto; background: #111827; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .email-header { background: linear-gradient(135deg, #1e293b, #0f172a); padding: 24px 28px; border-bottom: 1px solid rgba(255, 255, 255, 0.08); display: flex; align-items: center; justify-content: space-between; }
    .brand-title { font-size: 20px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin: 0; }
    .brand-accent { color: #f2c14e; }
    .email-body { padding: 28px; }
    .status-badge { display: inline-block; padding: 4px 10px; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 999px; color: #34d399; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 14px; }
    h1 { font-size: 22px; font-weight: 700; color: #f8fafc; margin: 0 0 12px 0; }
    p { font-size: 14px; line-height: 1.6; color: #cbd5e1; margin: 0 0 18px 0; }
    .info-table { width: 100%; border-collapse: collapse; margin: 20px 0; background: #1e293b; border-radius: 8px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.06); }
    .info-table td { padding: 12px 16px; font-size: 13px; border-bottom: 1px solid rgba(255, 255, 255, 0.06); }
    .info-table tr:last-child td { border-bottom: none; }
    .info-label { color: #94a3b8; font-weight: 500; width: 34%; }
    .info-value { color: #f1f5f9; font-weight: 600; }
    .security-notice { background: rgba(245, 158, 11, 0.1); border-left: 4px solid #f59e0b; padding: 14px 16px; border-radius: 0 8px 8px 0; margin: 22px 0 14px 0; }
    .security-notice p { margin: 0; font-size: 13px; color: #fde68a; line-height: 1.5; }
    .email-footer { background: #0f172a; padding: 20px 28px; border-top: 1px solid rgba(255, 255, 255, 0.08); font-size: 11px; color: #64748b; line-height: 1.5; text-align: center; }
    .email-footer a { color: #94a3b8; text-decoration: underline; }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-card">
      <div class="email-header">
        <h2 class="brand-title">{$escapedWebsite} <span class="brand-accent">⚡</span></h2>
      </div>
      <div class="email-body">
        <span class="status-badge">Security Notice</span>
        <h1>Successful Login Notification</h1>
        <p>Hello <strong>{$escapedName}</strong>,</p>
        <p>Your <strong>{$escapedWebsite}</strong> account was successfully accessed on <strong>{$escapedTime}</strong>.</p>
        
        <table class="info-table" role="presentation">
          <tr>
            <td class="info-label">Account Email</td>
            <td class="info-value">{$escapedEmail}</td>
          </tr>
          <tr>
            <td class="info-label">Role</td>
            <td class="info-value">{$userRole}</td>
          </tr>
          <tr>
            <td class="info-label">Login Date &amp; Time</td>
            <td class="info-value">{$escapedTime}</td>
          </tr>
          <tr>
            <td class="info-label">IP Address</td>
            <td class="info-value">{$escapedIp}</td>
          </tr>
          <tr>
            <td class="info-label">Client Device</td>
            <td class="info-value" style="font-size:12px;word-break:break-all;">{$escapedUserAgent}</td>
          </tr>
        </table>

        <div class="security-notice">
          <p><strong>Didn't log in?</strong> If you do not recognize this activity, your credentials may be compromised. Please change your password immediately or contact our Data Protection Officer support desk.</p>
        </div>
      </div>
      <div class="email-footer">
        <p>© 2026 {$escapedWebsite} Platform. Directorate of Vocational Education &amp; Training (DVET), Government of Maharashtra.</p>
        <p>This is an automated statutory security notification. Please do not reply directly to this email.</p>
      </div>
    </div>
  </div>
</body>
</html>
HTML;

    $textBody = <<<TEXT
============================================================
{$websiteName} - Successful Login Notification
============================================================

Hello {$recipientName},

Your {$websiteName} account was successfully accessed.

Login Details:
- Account Email: {$recipientEmail}
- Role: {$userRole}
- Date & Time: {$loginTime}
- IP Address: {$ipAddress}
- Device: {$userAgent}

SECURITY NOTICE:
If this was you, no action is needed. If you did NOT log in, please reset your password immediately and contact support at support@skillpulse.in.

------------------------------------------------------------
© 2026 {$websiteName} Platform. Directorate of Vocational Education & Training (DVET), Government of Maharashtra.
This is an automated security notice. Please do not reply directly.
TEXT;

    // In local development with mock/unconfigured credentials, simulate cleanly
    if ($isPlaceholder) {
        error_log("[SkillPulse Mailer] NOTICE: Real SMTP credentials not configured in .env. Notification for '{$recipientEmail}' logged in simulation mode.");
        return [
            'success' => true,
            'message' => 'Login notification dispatched (simulation mode - set MAIL_USERNAME and MAIL_PASSWORD in .env for live SMTP delivery).',
            'simulated' => true
        ];
    }

    try {
        $mail = create_mailer_client(true);
        $mail->addAddress($recipientEmail, $recipientName);
        $mail->isHTML(true);
        $mail->Subject = "Successful Login - {$websiteName}";
        $mail->Body = $htmlBody;
        $mail->AltBody = $textBody;

        $sent = $mail->send();

        if ($sent) {
            error_log("[SkillPulse Mailer] Login notification successfully sent to {$recipientEmail}.");
            return [
                'success' => true,
                'message' => 'Login notification email sent successfully.',
                'simulated' => false
            ];
        }

        return [
            'success' => false,
            'message' => 'Mail delivery failed.'
        ];
    } catch (\Throwable $e) {
        // Log securely on server without exposing secrets or detailed exceptions to the client
        error_log("[SkillPulse Mailer] ERROR sending to {$recipientEmail}: " . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Mail delivery encountered an error and was safely suppressed.'
        ];
    }
}
