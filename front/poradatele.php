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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro pořadetele - ASK Hořovice</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/premium-design.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- ============================================
     NAVBAR
     ============================================ -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="./main.php">
            <img src="\SVGLOGA\sadasdsd.svg" alt="ASK Hořovice" style="height: 50px;">
            <span>ASK Hořovice</span>
        </a>

        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center" style="gap: 0.5rem;">
                <li class="nav-item"><a class="nav-link" href="./main.php#home">Domů</a></li>
                <li class="nav-item"><a class="nav-link" href="./main.php#zavody">Závody</a></li>
                <li class="nav-item"><a class="nav-link" href="./main.php#about">O nás</a></li>
                <li class="nav-item"><a class="nav-link" href="./main.php#galerie">Galerie</a></li>
                <li class="nav-item"><a class="nav-link" href="./main.php#kontakt">Kontakt</a></li>
                <?php if(isset($_SESSION['role'])): ?>
                    <li class="nav-item"><a class="nav-link active" href="./poradatele.php">Pro pořadetele</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item"><a class="nav-link" href="../back/view_logs.php">Logy</a></li>
                <?php endif; ?>
                <li class="nav-item" style="margin-left: 1rem;">
                    <?php if(!isset($_SESSION['username'])): ?>
                        <a href="./Login.php" class="btn-secondary-custom" style="display: inline-block;">Přihlášení</a>
                    <?php else: ?>
                        <a href="../back/logout.php" class="btn-secondary-custom" style="display: inline-block;">Odhlásit se</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ============================================
     MAIN CONTENT
     ============================================ -->
<div class="section-container">
    <div class="content-wrapper">
        <div class="section-title">
            <h2>Pro pořadetele</h2>
            <p class="text-secondary" style="font-size: 1.1rem; margin-top: 0.5rem;">Stažení potřebných materiálů a dokumentů</p>
        </div>

        <!-- PDF Files Section -->
        <div class="card-premium">
            <h4 class="text-primary mb-4">Dostupné dokumenty</h4>
            
            <div class="pdf-list">
                <?php
                $folder = __DIR__ . "/pdfs";
                if (!is_dir($folder)) {
                    echo '<div class="alert alert-info" role="alert">';
                    echo '📁 Složka <strong>pdfs</strong> není dostupná. Kontaktujte administrátora.';
                    echo '</div>';
                } else {
                    $files = array_diff(scandir($folder), ['.', '..']);
                    $hasPdf = false;

                    foreach ($files as $file) {
                        if (pathinfo($file, PATHINFO_EXTENSION) === "docx") {
                            echo '<a href="?file=' . urlencode($file) . '" class="pdf-item">';
                            echo '📄 ' . htmlspecialchars($file);
                            echo '</a>';
                            $hasPdf = true;
                        }
                    }

                    if (!$hasPdf) {
                        echo '<div class="alert alert-warning" role="alert">';
                        echo 'Žádné dokumenty zatím nejsou dostupné. Vraťte se později.';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="card-premium" style="margin-top: 2rem;">
            <h4 class="text-primary mb-3">Informace pro organizátory</h4>
            <p class="text-secondary">Zde najdete všechny potřebné materiály pro organizaci závodu. Pokud vám něco chybí, kontaktujte prosím administrátora.</p>
            <p style="margin-bottom: 0; margin-top: 1.5rem; color: var(--text-tertiary); font-size: 0.9rem;">
                ✓ Všechny soubory jsou chráněny a dostupné pouze po přihlášení<br>
                ✓ Soubory jsou vzorové dokumenty pro organizaci<br>
                ✓ Prosím aktualizujte data dle vašich potřeb
            </p>
        </div>
    </div>
</div>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer style="background: rgba(0, 0, 0, 0.3); border-top: 1px solid rgba(255, 255, 255, 0.05); padding: 2rem 0; margin-top: 4rem;">
    <div class="content-wrapper text-center">
        <p class="text-secondary mb-2">&copy; 2025 Auto Sport Klub Hořovice. Všechna práva vyhrazena.</p>
        <p class="text-tertiary" style="font-size: 0.9rem;">Vytvořeno s ❤️ pro motoristický sport</p>
    </div>
</footer>

<style>
    /* Navbar styling for this page */
    .navbar {
        background: rgba(10, 14, 39, 0.8);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        transition: all var(--transition-base);
    }

    .navbar.scrolled {
        background: rgba(10, 14, 39, 0.95);
        box-shadow: var(--shadow-md);
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--primary);
        font-weight: 700;
        font-size: 1.3rem;
        text-decoration: none;
    }

    .navbar-brand:hover {
        color: var(--primary-light);
    }

    .navbar-toggler {
        width: 40px;
        height: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .navbar-toggler span {
        width: 25px;
        height: 3px;
        background: var(--text-primary);
        border-radius: 2px;
        transition: all var(--transition-base);
    }

    .navbar-toggler.collapsed span {
        opacity: 1;
        transform: none;
    }

    .navbar-collapse {
        padding-top: 1rem;
    }

    .nav-link {
        color: var(--text-secondary) !important;
        font-weight: 600;
        transition: all var(--transition-base);
        position: relative;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary) !important;
    }

    /* PDF List Styling */
    .pdf-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .pdf-item {
        display: block;
        padding: 1rem 1.5rem;
        background: rgba(230, 57, 70, 0.1);
        border: 1px solid rgba(230, 57, 70, 0.2);
        border-radius: 12px;
        color: var(--text-primary);
        text-decoration: none;
        transition: all var(--transition-base);
        font-weight: 600;
        text-align: center;
    }

    .pdf-item:hover {
        background: linear-gradient(135deg, rgba(230, 57, 70, 0.15), rgba(230, 57, 70, 0.05));
        border-color: var(--primary);
        color: var(--primary);
        transform: translateX(4px);
        box-shadow: var(--shadow-md), var(--shadow-glow);
    }

    /* Smooth scroll navigation */
    @media (max-width: 991px) {
        .navbar-collapse {
            background: rgba(15, 20, 25, 0.95);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
        }

        .nav-link {
            padding: 0.75rem 1rem !important;
            text-align: center;
        }
    }
</style>

<script>
    // Smooth scroll for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
