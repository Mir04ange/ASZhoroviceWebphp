<?php
// Připojení k databázi
$pdo = new PDO("mysql:host=localhost;dbname=tvadatabase;charset=utf8", "uzivatel", "heslo");

// Ověření, jestli je přihlášený admin
$isAdmin = true; // to si uprav podle své logiky (session, role atd.)

// Zpracování formuláře
if ($isAdmin && isset($_POST['user_id'])) {
    $id = (int)$_POST['user_id'];
    $isActive = isset($_POST['is_active']) ? 1 : 0;

    $stmt = $pdo->prepare("UPDATE users SET is_active=? WHERE id=?");
    $stmt->execute([$isActive, $id]);
}
