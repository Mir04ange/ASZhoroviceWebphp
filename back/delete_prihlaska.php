<?php

session_start();
require_once './../back/Database/db.php';
require_once './../back/Database/AdminLogger.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../front/main.php');
    exit;
}

$logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_prihlaska'])) {
    $id = (int)$_POST['id_prihlaska'];

    if ($id > 0) {
        $stmt = $conn->prepare('SELECT * FROM prihlasky WHERE id_prihlaska = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $prihaska_data = $result->fetch_assoc();
        $stmt->close();

        $delete_stmt = $conn->prepare('DELETE FROM prihlasky WHERE id_prihlaska = ?');
        $delete_stmt->bind_param('i', $id);

        if ($delete_stmt->execute()) {
            $team = $prihaska_data['team'] ?? 'Unknown';
            $logger->log('REGISTRATION_DELETE', "Deleted registration ID: $id, Team: $team", 'success');
        } else {
            $logger->log('REGISTRATION_DELETE', "Failed to delete registration ID: $id", 'failed', $conn->error);
        }

        $delete_stmt->close();
    }
}

$conn->close();
header('Location: ../front/main.php');
exit;

?>
