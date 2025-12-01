<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect fields safely
    $team              = $_POST['team'] ?? '';
    $ridic_jmeno       = $_POST['ridic_jmeno'] ?? '';
    $ridic_op          = $_POST['ridic_op'] ?? '';
    $ridic_rc          = $_POST['ridic_rc'] ?? '';
    $ridic_rp          = $_POST['ridic_rp'] ?? '';
    $ridic_adresa      = $_POST['ridic_adresa'] ?? '';
    $ridic_kontakt     = $_POST['ridic_kontakt'] ?? '';
    $ridic_pojistovna  = $_POST['ridic_pojistovna'] ?? '';
    $spoluj_jmeno      = $_POST['spoluj_jmeno'] ?? '';
    $spoluj_op         = $_POST['spoluj_op'] ?? '';
    $spoluj_rc         = $_POST['spoluj_rc'] ?? '';
    $spoluj_rp         = $_POST['spoluj_rp'] ?? '';
    $spoluj_adresa     = $_POST['spoluj_adresa'] ?? '';
    $spoluj_kontakt    = $_POST['spoluj_kontakt'] ?? '';
    $spoluj_pojistovna = $_POST['spoluj_pojistovna'] ?? '';
    $auto_trida        = $_POST['auto_trida'] ?? '';
    $auto_spz          = $_POST['auto_spz'] ?? '';
    $auto_znacka       = $_POST['auto_znacka'] ?? '';
    $auto_typ          = $_POST['auto_typ'] ?? '';
    $auto_obsah        = $_POST['auto_obsah'] ?? '';
    $auto_pojistovna   = $_POST['auto_pojistovna'] ?? '';
    $info              = $_POST['info'] ?? '';
    $souhlas           = isset($_POST['souhlas']) ? 1 : 0;
    $datum_zavodu      = $race_date = file_exists("./../front/race_date.txt") ? file_get_contents("./../front/race_date.txt") : "2025-01-01";
    $datum_prihlaseni  = date("Y-m-d H:i:s");

    $sql = "INSERT INTO prihlasky (
        team, ridic_jmeno, ridic_op, ridic_rc, ridic_rp, ridic_adresa, ridic_kontakt, ridic_pojistovna,
        spoluj_jmeno, spoluj_op, spoluj_rc, spoluj_rp, spoluj_adresa, spoluj_kontakt, spoluj_pojistovna,
        auto_trida, auto_spz, auto_znacka, auto_typ, auto_obsah, auto_pojistovna, info, souhlas,
        datum_zavodu, datum_prihlaseni
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssss",
        $team, $ridic_jmeno, $ridic_op, $ridic_rc, $ridic_rp, $ridic_adresa, $ridic_kontakt, $ridic_pojistovna,
        $spoluj_jmeno, $spoluj_op, $spoluj_rc, $spoluj_rp, $spoluj_adresa, $spoluj_kontakt, $spoluj_pojistovna,
        $auto_trida, $auto_spz, $auto_znacka, $auto_typ, $auto_obsah, $auto_pojistovna, $info,
        $souhlas, $datum_zavodu, $datum_prihlaseni
    );

    if ($stmt->execute()) {
        header("Location: ../front/main.php?success=1");
    } else {
        echo "<p style='color:red'>Chyba: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>