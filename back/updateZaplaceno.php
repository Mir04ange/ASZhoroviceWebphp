<?php

session_start();
require_once __DIR__ . '/Database/db.php';
require_once __DIR__ . '/Database/AdminLogger.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../front/main.php');
    exit;
}

$logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);

if (isset($_POST['id_prihlaska'])) {
    $id = (int)$_POST['id_prihlaska'];
    $zaplaceno = isset($_POST['zaplaceno']) ? 1 : 0;

    if (isset($conn) && $conn) {
        $stmt = $conn->prepare('SELECT team FROM prihlasky WHERE id_prihlaska = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $registration = $result->fetch_assoc();
        $stmt->close();

        $update_stmt = $conn->prepare('UPDATE prihlasky SET zaplaceno = ? WHERE id_prihlaska = ?');
        $update_stmt->bind_param('ii', $zaplaceno, $id);

        if ($update_stmt->execute()) {
            $team = $registration['team'] ?? 'Unknown';
            $status_text = $zaplaceno ? 'marked as paid' : 'marked as unpaid';
            $logger->log('PAYMENT_STATUS_UPDATE', "Registration ID: $id, Team: $team - $status_text", 'success');
        } else {
            $logger->log('PAYMENT_STATUS_UPDATE', "Failed to update payment status for ID: $id", 'failed', $conn->error);
        }

        $update_stmt->close();
        $conn->close();
    }
}

if (!empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../front/main.php');
}
exit;

?>
