<?php
session_start();

// Check if user is admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['error'] = "Nemáte oprávnění pro tuto akci.";
    header("Location: ../front/main.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_prihlaska'])) {
    $id_prihlaska = intval($_POST['id_prihlaska']);
    
    @include './Database/db.php';
    
    try {
        if (!isset($conn) || !$conn) {
            throw new Exception("Chyba připojení k databázi.");
        }
        
        // Get current status
        $result = $conn->query("SELECT zaplaceno FROM prihlasky WHERE id_prihlaska = $id_prihlaska");
        
        if (!$result || $result->num_rows === 0) {
            throw new Exception("Přihláška nebyla nalezena.");
        }
        
        $row = $result->fetch_assoc();
        $current_status = $row['zaplaceno'];
        $new_status = $current_status ? 0 : 1;
        
        // Update status
        $update_result = $conn->query("UPDATE prihlasky SET zaplaceno = $new_status WHERE id_prihlaska = $id_prihlaska");
        
        if (!$update_result) {
            throw new Exception("Chyba při aktualizaci: " . $conn->error);
        }
        
        // Log the action if logger exists
        @include './Database/AdminLogger.php';
        if (class_exists('AdminLogger')) {
            $logger = new AdminLogger($conn, $_SESSION['user_id'] ?? 0, $_SESSION['username'] ?? 'unknown');
            $logger->log('PAYMENT_STATUS_UPDATE', 'Updated registration #' . $id_prihlaska . ' paid status to ' . ($new_status ? 'Yes' : 'No'));
        }
        
        $_SESSION['success'] = "Stav zaplacení byl aktualizován.";
        
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    } finally {
        if (isset($conn) && $conn) $conn->close();
    }
    
    header("Location: ../front/main.php#zavody");
    exit;
}

header("Location: ../front/main.php");
exit;
?>
