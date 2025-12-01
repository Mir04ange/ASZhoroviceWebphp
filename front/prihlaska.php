<?php
session_start();

// datum závodu
$race_date = file_exists("race_date.txt") ? file_get_contents("race_date.txt") : "2025-01-01";

// zpracování formuláře
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST;
    $data["datum_zavodu"] = $race_date;
    $data["datum_prihlaseni"] = date("Y-m-d H:i:s");
    $_SESSION['datum_zavodu'] = $race_date; // Uloží datum závodu do session

/*
    $soubor = "registrace.json";
    $registrace = file_exists($soubor) ? json_decode(file_get_contents($soubor), true) : [];
    $registrace[] = $data;
    file_put_contents($soubor, json_encode($registrace, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    */

    $_SESSION["success"] = "Přihláška byla úspěšně odeslána!";
    header("Location: ./../front/main.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <link rel="stylesheet" href="\front\css\prihlaska.css">
  <meta charset="UTF-8">
  <title>Přihlášení do závodu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- důležité pro mobily -->
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  
</head>
<body>
<div class="container py-5">
  <h1 class="text-center mb-4">Přihlášení do závodu</h1>
  <p class="text-center">Datum závodu: <strong><?= $race_date ?></strong></p>

  <?php if(isset($_SESSION["success"])): ?>
    <div class="alert alert-success text-center">
      <?= $_SESSION["success"]; unset($_SESSION["success"]); ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="./../back/Database/prihlaskaUploadToDB.php" class="shadow-lg p-4 rounded">

    <!-- TEAM -->
    <div class="form-section">
      <h3>TEAM</h3>
      <div class="mb-3">
        <label for="team">Název a místo působení (obec)</label>
        <input type="text" class="form-control" id="team" name="team" required>
      </div>
    </div>

    <!-- ŘIDIČ -->
    <div class="form-section">
      <h3>ŘIDIČ</h3>
      <div class="row g-3">
        <div class="col-sm-12 col-md-6"><label>Jméno a příjmení</label><input type="text" name="ridic_jmeno" class="form-control" required></div>
        <div class="col-sm-12 col-md-6"><label>Číslo občanského průkazu</label><input type="text" name="ridic_op" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Rodné číslo</label><input type="text" name="ridic_rc" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Číslo řidičského průkazu</label><input type="text" name="ridic_rp" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Bydliště / PSČ</label><input type="text" name="ridic_adresa" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Telefon / e-mail</label><input type="text" name="ridic_kontakt" class="form-control"></div>
        <div class="col-12"><label>Název pojišťovny pro úrazové pojištění</label><input type="text" name="ridic_pojistovna" class="form-control"></div>
      </div>
    </div>

    <!-- SPOLUJEZDEC -->
    <div class="form-section">
      <h3>SPOLUJEZDEC</h3>
      <div class="row g-3">
        <div class="col-sm-12 col-md-6"><label>Jméno a příjmení</label><input type="text" name="spoluj_jmeno" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Číslo občanského průkazu</label><input type="text" name="spoluj_op" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Rodné číslo</label><input type="text" name="spoluj_rc" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Číslo řidičského průkazu</label><input type="text" name="spoluj_rp" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Bydliště / PSČ</label><input type="text" name="spoluj_adresa" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Telefon / e-mail</label><input type="text" name="spoluj_kontakt" class="form-control"></div>
        <div class="col-12"><label>Název pojišťovny pro úrazové pojištění</label><input type="text" name="spoluj_pojistovna" class="form-control"></div>
      </div>
    </div>

    <!-- VOZIDLO -->
    <div class="form-section">
      <h3>VOZIDLO</h3>
      <div class="row g-3">
        <div class="col-sm-12 col-md-4"><label>Třída</label><input type="text" name="auto_trida" class="form-control"></div>
        <div class="col-sm-12 col-md-4"><label>SPZ</label><input type="text" name="auto_spz" class="form-control"></div>
        <div class="col-sm-12 col-md-4"><label>Tovární značka</label><input type="text" name="auto_znacka" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Typ</label><input type="text" name="auto_typ" class="form-control"></div>
        <div class="col-sm-12 col-md-6"><label>Obsah</label><input type="text" name="auto_obsah" class="form-control"></div>
        <div class="col-12"><label>Název pojišťovny pro pojištění odpovědnosti</label><input type="text" name="auto_pojistovna" class="form-control"></div>
      </div>
    </div>

    <!-- INFO -->
    <div class="form-section">
      <h3>Další informace o posádce</h3>
      <textarea class="form-control" name="info" rows="3"></textarea>
    </div>

    <!-- Prohlášení -->
    <div class="form-section">
      <h3>Čestné prohlášení</h3>
      <p class="small">
        Prohlašuji, že mnou uvedené údaje jsou pravdivé a že jsem obeznámen s pravidly soutěže,
        kterou absolvuji na vlastní nebezpečí, vlastní náklady a s povinným pojištěním.a
        Souhlasím se zpracováním osobních údajů pro potřeby ASK Hořovice.
      </p>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="souhlas" id="souhlas" required>
        <label class="form-check-label" for="souhlas">Souhlasím s podmínkami</label>
      </div>
    </div>

    <button type="submit" class="btn btn-custom w-100">Odeslat přihlášku</button>
  
  </form>
  <a href="./main.php"><button class="btn btn-customs w-100">Zpátky</button></a>
</div>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
