<?php

session_start();
require_once './Database/db.php';
require_once './Database/AdminLogger.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['error'] = 'Chyba: uživatelské jméno ani heslo nemůže být prázdné!';
    header('Location: ./../front/Login.php');
    exit;
}

$stmt = $conn->prepare('SELECT * FROM loginsystem WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        $logger = new AdminLogger($conn, $row['id'], $row['username']);
        $logger->log('LOGIN', 'User logged in successfully', 'success');

        header('Location: ./../front/main.php');
    } else {
        $logger = new AdminLogger($conn, 0, $username);
        $logger->log('LOGIN_FAILED', 'Invalid password', 'failed', 'Incorrect password');

        $_SESSION['error'] = 'Chyba: špatné uživatelské jméno nebo heslo!';
        header('Location: ./../front/Login.php');
    }
} else {
    $logger = new AdminLogger($conn, 0, $username);
    $logger->log('LOGIN_FAILED', 'User not found', 'failed', 'Username does not exist');

    $_SESSION['error'] = 'Chyba: špatné uživatelské jméno nebo heslo!';
    header('Location: ./../front/Login.php');
}

$stmt->close();
$conn->close();
exit;

?>
