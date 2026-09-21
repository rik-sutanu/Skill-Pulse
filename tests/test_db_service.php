<?php
require_once __DIR__ . '/../config/database.php';

$res = db_test_connection();
echo json_encode($res, JSON_PRETTY_PRINT) . PHP_EOL;

if (!$res['connected']) {
    echo "Notice: Database connection correctly identified as offline/fallback until user sets credentials in .env.\n";
} else {
    echo "Success: Connected to database!\n";
}
