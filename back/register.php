<?php

session_start();
require_once './Database/db.php';

if (!isset($conn) || $conn->connect_error) {
    die('Chyba: Nelze se připojit k databázi!');
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    die('Chyba: uživatelské jméno ani heslo nemůže být prázdné!');
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare('INSERT INTO loginsystem (username, password) VALUES (?, ?)');
if (!$stmt) {
    die('Chyba: ' . $conn->error);
}
$stmt->bind_param('ss', $username, $hash);

if ($stmt->execute()) {
    $_SESSION['success'] = 'Registrace byla úspěšná!';
    header('Location: ./../front/Login.php');
} else {
    die('Chyba: ' . $conn->error);
}

$stmt->close();
$conn->close();
exit;

?>