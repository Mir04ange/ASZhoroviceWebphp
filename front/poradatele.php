<?php
session_start();
// -------- DOWNLOAD LOGIC --------
if (isset($_GET['file']) && $_SESSION['role']) {
    $filename = $_GET['file'];
    $filepath = __DIR__ . "/pdfs/" . $filename;

    // small security check
    if (!preg_match('/^[a-zA-Z0-9_\-\.]+\.docx$/', $filename)) {
        die("Invalid filename.");
    }

    if (!file_exists($filepath)) {
        die("File not found.");
    }

    header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Length: " . filesize($filepath));
    readfile($filepath);
    exit;
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>

      <script src="\front\js\cursor.js"></script>
    <link rel="stylesheet" href="./css/btn.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/Carousel.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./scss/footer.scss">
    <link rel="stylesheet" href="./css/mujtext.css">
    <link rel="stylesheet" href="./css/navbars.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <title>PDF Ke Stažení</title>

    <style>
        body {
            margin: 0;
            background-color: #121212;
            font-family: Arial, sans-serif;
            color: white;
        }

        .container {
            width: 85%;
            max-width: 800px;
            margin: 60px auto;
        }

        .content-box {
            background: rgba(28, 28, 28, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 25px rgba(0,0,0,0.4);
            backdrop-filter: blur(4px);
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        .pdf-list a {
            display: block;
            padding: 12px 15px;
            margin: 8px;
            margin-top: 4%;
            background: white;
            color: black;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.2s;
        }

        .pdf-list a:hover {
            background: #00bc10ff;
            transform: translateY(-1px);
            transition: 1s;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top p-3" style="background-color:#1c1c1cff;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">
            <img src="\SVGLOGA\sadasdsd.svg" alt="AZK" style="height: 50px;">
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler border-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav text-center" style="background-color: #1c1c1cff; border-radius: 10px;">
                <li class="nav-item active-element"><a class="nav-link text-white" href="./main.php">Domů</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#">Závody</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#textx">O nás</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#textx">Fotky</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#kontakt">Kontakt</a></li>
                <?php if(isset($_SESSION['role'])): ?>
                    <li class="nav-item active-element"><a class="nav-link text-white" href="./poradatele.php">Pro pořadetele</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item active-element"><a class="nav-link text-white" href="../back/view_logs.php">Logy</a></li>
                <?php endif; ?>
                <li class="nav-item d-lg-none mt-2">
                    <?php if(!isset($_SESSION['username'])): ?>
                        <a href="./Login.php" class="btn btn-outline-light w-100">Přihlášení</a>
                    <?php else: ?>
                        <a href="../back/logout.php" class="btn btn-outline-light w-100">Odhlásit se</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>

        <!-- Přihlášení / Odhlášení na DESKTOPU -->
        <div class="d-none d-lg-block">
            <?php if(!isset($_SESSION['username'])): ?>
                <a href="./Login.php" class="btn btn-outline-light">Přihlášení</a>
            <?php else: ?>
                <a href="../back/logout.php" class="btn btn-outline-light">Odhlásit se</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 10%;">
    <div class="content-box">
        <h2>PDF Ke Stažení</h2>
        <p style="text-align:center;">Vyberte soubor k stažení.</p>

        <div class="pdf-list">
            <?php
            // list pdfs
            $folder = __DIR__ . "/pdfs";
            if (!is_dir($folder)) {
                echo "<p>📁 Složka <b>pdfs</b> neexistuje. Vytvoř ji prosím.</p>";
            } else {
                $files = array_diff(scandir($folder), ['.', '..']);
                $hasPdf = false;

                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === "docx") {
                        echo "<a href='?file=" . urlencode($file) . "'>$file</a>";
                        $hasPdf = true;
                    }
                }

                if (!$hasPdf) {
                    echo "<p>Žádné Docx soubory nenalezeny.</p>";
                }
            }
            ?>
        </div>

    </div>
</div>


<footer class="footer container-fluid">
  <div class="footer-content">
    <p>Stránku vytvořili <strong>Miroslav Blecha</strong> a <strong>Dan Čejka</strong></p>
    <p>&copy; 2025 Auto sport klub Hořovice – Všechna práva vyhrazena</p>
  </div>
</footer>

</body>
</html>
