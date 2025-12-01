<?php

session_start();
require_once './Database/db.php';
require_once './Database/AdminLogger.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Přístup zamítnut.');
}

$logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);
$target_dir = '../front/uploads/carousel/';

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$carousel_paths = array();

if (file_exists('../front/carousel_images.json')) {
    $carousel_paths = json_decode(file_get_contents('../front/carousel_images.json'), true);
    if (!is_array($carousel_paths)) {
        $carousel_paths = array();
    }
}

$uploaded_count = 0;

for ($i = 1; $i <= 5; $i++) {
    $key = (string)$i;

    if (isset($_FILES["carousel_img$i"]) && $_FILES["carousel_img$i"]['error'] === 0) {
        $ext = strtolower(pathinfo($_FILES["carousel_img$i"]['name'], PATHINFO_EXTENSION));
        $fileName = 'carousel_' . $i . '.' . $ext;
        $target_file = $target_dir . $fileName;

        if (move_uploaded_file($_FILES["carousel_img$i"]['tmp_name'], $target_file)) {
            $carousel_paths[$key] = $fileName;
            $uploaded_count++;
        }
    } else if (!isset($carousel_paths[$key])) {
        $carousel_paths[$key] = '';
    }
}

file_put_contents('../front/carousel_images.json', json_encode($carousel_paths, JSON_PRETTY_PRINT));

$logger->log('CAROUSEL_UPDATE', "Updated $uploaded_count carousel images", 'success');
$conn->close();

header('Location: ../front/main.php');
exit;

?>
