<?php
/**
 * SkillPulse Central Database Connection Service (PDO)
 * Provides direct, high-performance database connectivity for PostgreSQL (Supabase) and MySQL.
 * Configured with Hostname, Port, Database Name, Username, and Password via environment variables.
 * Compliant with CERT-In and DPDP Act 2023 security guidelines.
 */

require_once __DIR__ . '/../backend/security.php';

// Ensure environment variables are loaded
if (!function_exists('load_skillpulse_env')) {
    function load_skillpulse_env() {
        $envPath = __DIR__ . '/../.env';
        if (!file_exists($envPath) || !is_readable($envPath)) {
            return;
        }
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) return;

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $val) = explode('=', $line, 2);
                $name = trim($name);
                $val = trim($val);
                if ((str_starts_with($val, '"') && str_ends_with($val, '"')) ||
                    (str_starts_with($val, "'") && str_ends_with($val, "'"))) {
                    $val = substr($val, 1, -1);
                }
                if (!array_key_exists($name, $_ENV)) {
                    $_ENV[$name] = $val;
                    putenv("$name=$val");
                }
            }
        }
    }
}
load_skillpulse_env();

/**
 * Returns singleton PDO Database Connection instance
 *
 * @return PDO|null Returns active PDO instance or null on connection failure
 */
function get_db_connection(): ?PDO {
    static $pdo = null;
    static $attempted = false;

    if ($pdo !== null) {
        return $pdo;
    }

    if ($attempted) {
        return null;
    }
    $attempted = true;

    // Database Connection Parameters from Environment
    $driver = strtolower(getenv('DB_DRIVER') ?: ($_ENV['DB_DRIVER'] ?? 'pgsql'));
    $host = getenv('DB_HOST') ?: ($_ENV['DB_HOST'] ?? '');
    $port = getenv('DB_PORT') ?: ($_ENV['DB_PORT'] ?? ($driver === 'pgsql' ? '5432' : '3306'));
    $dbName = getenv('DB_NAME') ?: ($_ENV['DB_NAME'] ?? 'postgres');
    $user = getenv('DB_USER') ?: ($_ENV['DB_USER'] ?? 'postgres');
    $password = getenv('DB_PASSWORD') ?: ($_ENV['DB_PASSWORD'] ?? '');
    $sslmode = getenv('DB_SSLMODE') ?: ($_ENV['DB_SSLMODE'] ?? 'prefer');

    // If host is not configured or placeholder, gracefully return null
    if (empty($host) || strpos($host, 'your-db-host') !== false || $host === 'placeholder') {
        return null;
    }

    try {
        if ($driver === 'pgsql') {
            // PostgreSQL / Supabase Direct Connection DSN
            $dsn = "pgsql:host={$host};port={$port};dbname={$dbName};sslmode={$sslmode}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 5,
                PDO::ATTR_PERSISTENT => false
            ];
        } else {
            // MySQL Connection DSN
            $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 5,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ];
        }

        $pdo = new PDO($dsn, $user, $password, $options);
        return $pdo;
    } catch (\PDOException $e) {
        // Log connection failure without exposing credentials
        error_log('[SkillPulse DB] Connection failed to host ' . htmlspecialchars($host, ENT_QUOTES, 'UTF-8') . ': ' . $e->getMessage());
        return null;
    }
}

/**
 * Check if the direct database connection is active and healthy
 */
function db_is_connected(): bool {
    $conn = get_db_connection();
    if ($conn === null) {
        return false;
    }
    try {
        $stmt = $conn->query('SELECT 1');
        return ($stmt !== false);
    } catch (\Throwable $e) {
        return false;
    }
}

/**
 * Execute a SELECT query with prepared statement parameters
 *
 * @param string $sql SQL query string with parameter placeholders
 * @param array $params Positional or named parameters
 * @return array Array of associative rows
 */
function db_query(string $sql, array $params = []): array {
    $conn = get_db_connection();
    if (!$conn) {
        return [];
    }
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (\PDOException $e) {
        error_log('[SkillPulse DB] Query error: ' . $e->getMessage());
        return [];
    }
}

/**
 * Fetch a single record using prepared statement
 *
 * @param string $sql SQL query string
 * @param array $params Query parameters
 * @return array|null First row or null
 */
function db_query_one(string $sql, array $params = []): ?array {
    $conn = get_db_connection();
    if (!$conn) {
        return null;
    }
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $res = $stmt->fetch();
        return ($res !== false) ? $res : null;
    } catch (\PDOException $e) {
        error_log('[SkillPulse DB] QueryOne error: ' . $e->getMessage());
        return null;
    }
}

/**
 * Execute an INSERT, UPDATE, or DELETE query with prepared statement
 *
 * @param string $sql SQL statement
 * @param array $params Query parameters
 * @return int Number of affected rows
 */
function db_execute(string $sql, array $params = []): int {
    $conn = get_db_connection();
    if (!$conn) {
        return 0;
    }
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    } catch (\PDOException $e) {
        error_log('[SkillPulse DB] Execute error: ' . $e->getMessage());
        return 0;
    }
}

/**
 * Health check helper for diagnostics
 */
function db_test_connection(): array {
    $host = getenv('DB_HOST') ?: ($_ENV['DB_HOST'] ?? '');
    $dbName = getenv('DB_NAME') ?: ($_ENV['DB_NAME'] ?? '');
    $driver = getenv('DB_DRIVER') ?: ($_ENV['DB_DRIVER'] ?? 'pgsql');
    $port = getenv('DB_PORT') ?: ($_ENV['DB_PORT'] ?? '5432');

    $connected = db_is_connected();

    return [
        'connected' => $connected,
        'driver' => $driver,
        'host' => !empty($host) ? $host : 'Not configured (using local fallback)',
        'port' => $port,
        'database' => !empty($dbName) ? $dbName : 'Not configured',
        'status' => $connected ? 'OPERATIONAL' : 'OFFLINE_FALLBACK_ACTIVE'
    ];
}
