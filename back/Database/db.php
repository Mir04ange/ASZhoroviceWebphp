<?php

require_once __DIR__ . '/EnvLoader.php';

$env_path = __DIR__ . '/../../.env';

// Initialize connection as null
$conn = null;
$db_error = null;

// Check if mysqli extension is available
if (!extension_loaded('mysqli')) {
    $db_error = 'mysqli extension is not installed. Please enable it in php.ini';
    error_log('Database Error: ' . $db_error);
} else {
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
    try {
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            $db_error = 'Database connection failed: ' . $conn->connect_error;
            error_log('Database Error: ' . $db_error);
            $conn = null;
        } else {
            $conn->set_charset($db_charset);
        }
    } catch (Exception $e) {
        $db_error = 'Database error: ' . $e->getMessage();
        error_log('Database Error: ' . $db_error);
        $conn = null;
    }
}

// Helper function to check if database is available
function isDatabaseAvailable() {
    global $conn;
    return $conn !== null && $conn instanceof mysqli;
}

?>
