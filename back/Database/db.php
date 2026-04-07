<?php

require_once __DIR__ . '/EnvLoader.php';

$env_path = __DIR__ . '/../../.env';

// Load .env file if it exists
if (file_exists($env_path)) {
    try {
        EnvLoader::load($env_path);
    } catch (Exception $e) {
        // Log error but continue with defaults
        error_log('Warning: ' . $e->getMessage());
    }
}

// Get database credentials from .env or use defaults
$db_host = EnvLoader::get('DB_HOST', 'localhost');
$db_user = EnvLoader::get('DB_USER', 'root');
$db_pass = EnvLoader::get('DB_PASS', '');
$db_name = EnvLoader::get('DB_NAME', 'ask_horovice');
$db_charset = EnvLoader::get('DB_CHARSET', 'utf8mb4');

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection - don't die, just log the error
if ($conn->connect_error) {
    // Log the error but don't stop the page from loading
    error_log('Database connection error: ' . $conn->connect_error);
    // Set conn to null so we can check if database is available
    $conn = null;
} else {
    $conn->set_charset($db_charset);
}

?>
