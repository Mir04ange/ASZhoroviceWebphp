<?php

require_once 'db.php';
session_start();

$sql = 'SELECT * FROM prihlasky ORDER BY datum_prihlaseni DESC';
$result = $conn->query($sql);

$prihlasky = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prihlasky[] = $row;
    }
}

$_SESSION['prihlasky'] = $prihlasky;
header('Location: ../front/main.php');
exit;

?>