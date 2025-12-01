<?php

require_once __DIR__ . '/EnvLoader.php';

$env_path = __DIR__ . '/../../.env';

if (!file_exists($env_path)) {
    die('Error: .env file not found. Please create a .env file with database credentials.');
}

EnvLoader::load($env_path);

$db_host = EnvLoader::get('DB_HOST');
$db_user = EnvLoader::get('DB_USER');
$db_pass = EnvLoader::get('DB_PASS');
$db_name = EnvLoader::get('DB_NAME');
$db_charset = EnvLoader::get('DB_CHARSET', 'utf8mb4');

if (!$db_host || !$db_user || !$db_name) {
    die('Error: Missing required database credentials in .env file.');
}

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die('Error: Database connection failed: ' . $conn->connect_error);
}

$conn->set_charset($db_charset);

?>