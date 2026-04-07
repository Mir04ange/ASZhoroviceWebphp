<?php
session_start();

// Check if user is admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['error'] = "Nemáte oprávnění pro tuto akci.";
    header("Location: ../front/main.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $info_text = $_POST['info_text'] ?? '';
    
    // Basic validation
    if (empty($info_text)) {
        $_SESSION['error'] = "Text nesmí být prázdný.";
        header("Location: ../front/main.php");
        exit;
    }
    
    // Save to file
    $info_file = __DIR__ . '/../front/info_text.txt';
    
    if (file_put_contents($info_file, $info_text) !== false) {
        $_SESSION['success'] = "Informační text byl úspěšně aktualizován.";
    } else {
        $_SESSION['error'] = "Chyba při ukládání textu.";
    }
    
    header("Location: ../front/main.php");
    exit;
}
?>
