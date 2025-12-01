<?php

session_start();
require_once './Database/db.php';
require_once './Database/AdminLogger.php';

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);
    $logger->log('LOGOUT', 'User logged out', 'success');
}

$conn->close();
session_destroy();
header('Location: ../front/main.php');
exit;

?>