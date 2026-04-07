<?php
session_start();

$prihlasky = $_SESSION['prihlasky'] ?? [];

$fallbacks = [
  "https://tse4.mm.bing.net/th/id/OIP.DSr9J-h2QljIcLKdLZfrLQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3",
  "https://tse4.mm.bing.net/th/id/OIP.DSr9J-h2QljIcLKdLZfrLQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3",
  "https://tse4.mm.bing.net/th/id/OIP.DSr9J-h2QljIcLKdLZfrLQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3",
  "https://tse4.mm.bing.net/th/id/OIP.DSr9J-h2QljIcLKdLZfrLQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3",
  "https://tse4.mm.bing.net/th/id/OIP.DSr9J-h2QljIcLKdLZfrLQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3"
];

$carousel_paths = [];
if (file_exists("carousel_images.json")) {
  $json = json_decode(file_get_contents("carousel_images.json"), true);
  $carousel_paths = (is_array($json) && count($json) > 0) ? $json : $fallbacks;
} else {
  $carousel_paths = $fallbacks;
}

$race_date = file_exists("race_date.txt") ? file_get_contents("race_date.txt") : "2025-01-01";
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASK Hořovice - Automobilový Sport Klub</title>
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
        <a class="navbar-brand" href="#home">
            <img src="\SVGLOGA\sadasdsd.svg" alt="ASK Hořovice" style="height: 50px;">
            <span>ASK Hořovice</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Domů</a></li>
                <li class="nav-item"><a class="nav-link" href="#zavody">Závody</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">O nás</a></li>
                <li class="nav-item"><a class="nav-link" href="#galerie">Galerie</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
                <?php if(isset($_SESSION['role'])): ?>
                    <li class="nav-item"><a class="nav-link" href="./poradatele.php">Pro pořadetele</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item"><a class="nav-link" href="../back/view_logs.php">Logy</a></li>
                <?php endif; ?>
            </ul>
            <div class="ms-3 mt-2 mt-lg-0">
                <?php if(!isset($_SESSION['username'])): ?>
                    <a href="./Login.php" class="btn-secondary-custom">Přihlášení</a>
                <?php else: ?>
                    <a href="../back/logout.php" class="btn-secondary-custom">Odhlásit se</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- ============================================
     HERO SECTION - CAROUSEL
     ============================================ -->
<div class="carousel-container" id="home">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach($carousel_paths as $index => $img): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img class="d-block w-100" src="<?php
                        if (filter_var($img, FILTER_VALIDATE_URL)) {
                            echo $img;
                        } else {
                            echo './uploads/carousel/' . $img;
                        }
                    ?>" alt="Obrázek <?= $index+1 ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 6 15 12 9 18"></polyline>
            </svg>
        </button>
    </div>
</div>

<!-- ============================================
     ADMIN PANEL
     ============================================ -->
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
<div class="section-container" style="background: rgba(230, 57, 70, 0.05); border-top: 1px solid rgba(230, 57, 70, 0.2);">
    <div class="content-wrapper">
        <h3 class="text-primary mb-4">Správa obsahu</h3>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card-premium">
                    <h4 class="text-primary mb-3">Upravit Carousel</h4>
                    <form action="update_carousel.php" method="POST" enctype="multipart/form-data">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <div class="form-group">
                                <label class="form-label">Obrázek <?= $i ?></label>
                                <input type="file" name="carousel_img<?= $i ?>" accept="image/*" class="form-control">
                                <small class="text-secondary mt-2 d-block">nebo vložte URL:</small>
                                <input type="text" name="carousel_url<?= $i ?>" placeholder="https://..." class="form-control mt-2">
                            </div>
                        <?php endfor; ?>
                        <button type="submit" class="btn-primary-custom w-100">Uložit obrázky</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-premium">
                    <h4 class="text-primary mb-3">Upravit datum závodu</h4>
                    <form action="../back/update_date.php" method="POST">
                        <div class="form-group">
                            <label class="form-label">Datum</label>
                            <input type="date" name="race_date" class="form-control" value="<?= $race_date ?>" required>
                        </div>
                        <button type="submit" class="btn-primary-custom w-100">Uložit datum</button>
                    </form>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger mt-4" role="alert">
                <?= htmlspecialchars($_SESSION['error']); ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success mt-4" role="alert">
                <?= htmlspecialchars($_SESSION['success']); ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<!-- ============================================
     CTA SECTION
     ============================================ -->
<div class="section-container" style="background: linear-gradient(135deg, rgba(230, 57, 70, 0.1), rgba(29, 53, 87, 0.1));">
    <div class="content-wrapper text-center">
        <h2 class="mb-3">Připravte se na start!</h2>
        <p class="text-secondary mb-4" style="font-size: 1.1rem;">Datum závodu: <strong style="color: var(--primary);"><?= $race_date ?></strong></p>
        <a href="./prihlaska.php" class="btn-primary-custom">Přihlásit se do závodu</a>
    </div>
</div>

<!-- ============================================
     ABOUT SECTION
     ============================================ -->
<div class="section-container" id="about">
    <div class="content-wrapper">
        <div class="section-title">
            <h2>O nás</h2>
        </div>

        <div class="about-section">
            <h3 class="about-title">Auto sport klub Hořovice</h3>

            <div class="about-subtitle">Motoristé, připravte se na start! 🏁</div>
            <p class="about-text">
                Máte slabost pro auta, závody a pořádný motoristický adrenalin? 
                Chcete zažít rallye z první řady a podílet se na akcích, kde se točí volanty, 
                pálí gumy a tleská stovky fanoušků? Pak jste na správné adrese – 
                <span class="about-highlight">Auto sport klub Hořovice</span>!
            </p>

            <div class="about-subtitle">Kdo vlastně jsme?</div>
            <p class="about-text">
                Jsme parta nadšenců pod <span class="about-highlight">Autoklubem ČR</span>. 
                Hlavní náplní je pořádání automobilových soutěží – od rallye až po orientační jízdy. 
                Naši členové se nezastaví – jednou stojí na startu, jindy organizují závody 
                a hlavně – užívají si motorismus naplno.
            </p>

            <div class="about-subtitle">Co pořádáme?</div>
            <p class="about-text">
                Naší vlajkovou lodí je <span class="about-highlight">Rallye Hořovice o pohár města Hořovic</span>.
            </p>
            <ul class="about-list">
                <li>Letos už poběží <strong>16. ročník</strong>.</li>
                <li>Na startu se pravidelně objevuje <strong>více než 120 posádek</strong>.</li>
                <li>Díky podpoře města, sponzorů a hlavně našich členů má závod prestiž a tradici.</li>
            </ul>
            <p class="about-text">
                A kdo za tím vším stojí? 👉 Bez 150 pořadatelů, hasičů, zdravotníků 
                a dobrovolníků by to prostě nešlo.
            </p>

            <div class="about-subtitle">A to není všechno!</div>
            <ul class="about-list">
                <li>🚗 Rodinné soutěže <em>"Výlet za tajným cílem"</em> zakončené večerním posezením.</li>
                <li>🚌 Každoroční zájezdy na zajímavá místa.</li>
            </ul>

            <div class="about-subtitle">Chcete se přidat?</div>
            <p class="about-text">
                Hledáme nové tváře – nejen řidiče, ale i ty, kdo umí fotit, natáčet, psát, propagovat, 
                nebo rozumí internetu a technice. 👉 Každý, kdo má rád auta a dobrou partu, 
                má u nás dveře otevřené!
            </p>
        </div>
    </div>
</div>

<!-- ============================================
     REGISTRATIONS SECTION
     ============================================ -->
<?php
$registrace = [];
$db_error = null;

@include './../back/Database/db.php';

try {
    if (isset($conn) && $conn) {
        if ($conn->connect_error) {
            throw new Exception("Chyba připojení k DB: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM prihlasky ORDER BY datum_prihlaseni DESC LIMIT 10";
        $result = $conn->query($sql);

        if (!$result) {
            throw new Exception("Chyba při načítání dat: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            $registrace[] = $row;
        }
    } else {
        $db_error = "Databáze není dostupná.";
    }
} catch (Exception $e) {
    $db_error = $e->getMessage();
} finally {
    if (isset($conn) && $conn) $conn->close();
}
?>

<div class="section-container" id="zavody">
    <div class="content-wrapper">
        <div class="section-title">
            <h2>Poslední přihlášky</h2>
        </div>

        <?php if ($db_error): ?>
            <div class="alert alert-warning" role="alert">
                ℹ️ <?= htmlspecialchars($db_error) ?>
            </div>
        <?php endif; ?>

        <?php if (count($registrace) === 0): ?>
            <div class="card-premium text-center p-5">
                <p class="text-secondary">Zatím žádné přihlášky.</p>
            </div>
        <?php else: ?>
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>Řidič</th>
                            <th>Vozidlo</th>
                            <th>Datum přihlášky</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($registrace as $reg): ?>
                            <tr>
                                <td><?= htmlspecialchars($reg['team'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars($reg['ridic_jmeno'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars(($reg['auto_znacka'] ?? '') . ' ' . ($reg['auto_typ'] ?? '')) ?></td>
                                <td><?= htmlspecialchars($reg['datum_prihlaseni'] ?? 'N/A') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- ============================================
     CONTACT SECTION
     ============================================ -->
<div class="section-container" id="kontakt" style="background: linear-gradient(135deg, rgba(230, 57, 70, 0.1), rgba(29, 53, 87, 0.1));">
    <div class="content-wrapper">
        <div class="section-title">
            <h2>Kontakt</h2>
        </div>

        <div class="card-premium text-center p-5">
            <p class="text-secondary mb-3">Máte otázky? Kontaktujte nás:</p>
            <p style="font-size: 1.2rem; margin-bottom: 0;">
                <strong>Jan Vlček</strong><br>
                <span class="text-secondary">📞 604 243 278</span>
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

    // Active nav link on scroll
    window.addEventListener('scroll', function() {
        let current = '';
        const sections = document.querySelectorAll('div[id]');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').slice(1) === current) {
                link.classList.add('active');
            }
        });
    });
</script>

</body>
</html>
