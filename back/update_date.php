<?php

session_start();
require_once './Database/db.php';
require_once './Database/AdminLogger.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['error'] = 'Přístup zamítnut.';
    header('Location: ../front/main.php');
    exit;
}

$logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);

if (isset($_POST['race_date'])) {
    $date = $_POST['race_date'];

    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        if (file_put_contents('../front/race_date.txt', $date)) {
            $_SESSION['success'] = 'Datum závodu bylo úspěšně aktualizováno.';
            $logger->log('RACE_DATE_UPDATE', "Updated race date to: $date", 'success');
        } else {
            $_SESSION['error'] = 'Chyba při ukládání data.';
            $logger->log('RACE_DATE_UPDATE', "Failed to update race date to: $date", 'failed');
        }
    } else {
        $_SESSION['error'] = 'Neplatný formát data.';
        $logger->log('RACE_DATE_UPDATE', 'Invalid date format provided', 'failed');
    }
} else {
    $_SESSION['error'] = 'Nebylo zadáno žádné datum.';
    $logger->log('RACE_DATE_UPDATE', 'No date provided', 'failed');
}

$conn->close();
header('Location: ../front/main.php');
exit;

?>