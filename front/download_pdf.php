<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Composer autoload
include __DIR__ . '/../back/Database/db.php'; // Your DB connection

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Přístup odepřen');
}

// Try to fetch data from DB
$registrace = [];
$db_error = null;

try {
    $sql = "SELECT * FROM prihlasky ORDER BY id_prihlaska ASC";
    $result = $conn->query($sql);

    if ($result) {
        $registrace = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $db_error = "Chyba při načítání přihlášek: " . $conn->error;
    }
} catch (Exception $e) {
    $db_error = "Výjimka DB: " . $e->getMessage();
}

// Pokud se DB nepodařila načíst → vyhoď chybu
if ($db_error) {
    die("<p style='color:red'>" . htmlspecialchars($db_error) . "</p>");
}

// Create TCPDF instance
$pdf = new \TCPDF();
$pdf->SetAutoPageBreak(true, 15);

// Use a built-in UTF-8 font
$fontName = 'dejavusans';

foreach ($registrace as $index => $data) {
    $pdf->AddPage();

    // Header
    $pdf->SetFont($fontName, 'B', 14);
    $pdf->Cell(0, 10, "Přihláška #" . ($index + 1), 0, 1, 'C');
    $pdf->Ln(5);

    // TEAM
    $pdf->SetFont($fontName, 'B', 12);
    $pdf->Cell(0, 6, "TEAM", 0, 1);
    $pdf->SetFont($fontName, '', 12);
    $pdf->MultiCell(0, 6, "Název a místo působení: " . ($data['team'] ?? '-') . "\n" .
                            "Zaplaceno: " . (!empty($data['zaplaceno']) ? 'ANO' : 'NE') . "\n"
    );

    // ŘIDIČ
    $pdf->SetFont($fontName,'B',12);
    $pdf->Cell(0,6,"ŘIDIČ",0,1);
    $pdf->SetFont($fontName,'',12);
    $pdf->MultiCell(0,6,
        "Jméno: " . ($data['ridic_jmeno'] ?? '-') . "\n" .
        "Číslo OP: " . ($data['ridic_op'] ?? '-') . "\n" .
        "Rodné číslo: " . ($data['ridic_rc'] ?? '-') . "\n" .
        "Číslo ŘP: " . ($data['ridic_rp'] ?? '-') . "\n" .
        "Bydliště / PSČ: " . ($data['ridic_adresa'] ?? '-') . "\n" .
        "Telefon / e-mail: " . ($data['ridic_kontakt'] ?? '-') . "\n" .
        "Pojišťovna: " . ($data['ridic_pojistovna'] ?? '-') . "\n\n"
    );

    // SPOLUJEZDEC
    $pdf->SetFont($fontName,'B',12);
    $pdf->Cell(0,6,"SPOLUJEZDEC",0,1);
    $pdf->SetFont($fontName,'',12);
    $pdf->MultiCell(0,6,
        "Jméno: " . ($data['spoluj_jmeno'] ?? '-') . "\n" .
        "Číslo OP: " . ($data['spoluj_op'] ?? '-') . "\n" .
        "Rodné číslo: " . ($data['spoluj_rc'] ?? '-') . "\n" .
        "Číslo ŘP: " . ($data['spoluj_rp'] ?? '-') . "\n" .
        "Bydliště / PSČ: " . ($data['spoluj_adresa'] ?? '-') . "\n" .
        "Telefon / e-mail: " . ($data['spoluj_kontakt'] ?? '-') . "\n" .
        "Pojišťovna: " . ($data['spoluj_pojistovna'] ?? '-') . "\n\n"
    );

    // VOZIDLO
    $pdf->SetFont($fontName,'B',12);
    $pdf->Cell(0,6,"VOZIDLO",0,1);
    $pdf->SetFont($fontName,'',12);
    $pdf->MultiCell(0,6,
        "Třída: " . ($data['auto_trida'] ?? '-') . "\n" .
        "SPZ: " . ($data['auto_spz'] ?? '-') . "\n" .
        "Značka: " . ($data['auto_znacka'] ?? '-') . "\n" .
        "Typ: " . ($data['auto_typ'] ?? '-') . "\n" .
        "Obsah: " . ($data['auto_obsah'] ?? '-') . "\n" .
        "Pojišťovna: " . ($data['auto_pojistovna'] ?? '-') . "\n\n"
    );

    // DALŠÍ INFO
    $pdf->SetFont($fontName,'B',12);
    $pdf->Cell(0,6,"DALŠÍ INFORMACE O POSÁDCE",0,1);
    $pdf->SetFont($fontName,'',12);
    $pdf->MultiCell(0,6,($data['info'] ?? '-') . "\n\n");

    // ČESTNÉ PROHLÁŠENÍ
    $pdf->SetFont($fontName,'B',12);
    $pdf->Cell(0,6,"ČESTNÉ PROHLÁŠENÍ",0,1);
    $pdf->SetFont($fontName,'',12);
    $souhlas = isset($data['souhlas']) && $data['souhlas'] ? 'ANO' : 'NE';
    $pdf->MultiCell(0,6,"Souhlas s podmínkami: " . $souhlas);
    $pdf->Ln(3);

    $pdf->Cell(0,0,"----------------------------------------",0,1);
}

// Output the PDF
$pdf->Output('prihlasky.pdf', 'D');
