<?php
session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASK Hořovice</title>
    <script src="\front\js\cursor.js"></script>
    <link rel="stylesheet" href="/front/css/btn.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/Carousel.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="/front/scss/footer.scss">
    <link rel="stylesheet" href="/front/css/mujtext.css">
    <link rel="stylesheet" href="/front/css/navbars.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener("scroll", function() {
            const nav = document.querySelector(".navbar");
            nav.classList.toggle("scrolled", window.scrollY > 50);
        });
    </script>
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
                <li class="nav-item active-element"><a class="nav-link text-white" href="#">Domů</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#">Závody</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#textx">O nás</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#textx">Fotky</a></li>
                <li class="nav-item active-element"><a class="nav-link text-white" href="#kontakt">Kontakt</a></li>
                <?php if(isset($_SESSION['role'])): ?>
                    <li class="nav-item active-element"><a class="nav-link text-white" href="#">Pro pořadetele</a></li>
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
<div class="container" id="textx">
  <div class="center-text">
      <div class="onas-wrapper">
    <h1 class="onas-title">PDF ke stažení</h1>

    <section class="onas-section">
      <p class="onas-text autoShow">
        <span class="onas-highlight">Oznameni_do_obci_editovatelne.docx</span>
      </p>
    </section>

    <section class="onas-section">
      <h2 class="onas-subtitle">Kdo vlastně jsme?</h2>
      <p class="onas-text autoShow">
        Jsme parta nadšenců pod <span class="onas-highlight">Autoklubem ČR</span>. 
        Hlavní náplní je pořádání automobilových soutěží – od rallye až po orientační jízdy. 
        Naši členové se nezastaví – jednou stojí na startu, jindy organizují závody 
        a hlavně – užívají si motorismus naplno.
      </p>
    </section>

    <section class="onas-section">
      <h2 class="onas-subtitle">Co pořádáme?</h2>
      <p class="onas-text autoShow">Naší vlajkovou lodí je <span class="onas-highlight">Rallye Hořovice o pohár města Hořovic</span>.</p>
      <ul class="onas-list">
        <li>Letos už poběží <strong>16. ročník</strong>.</li>
        <li>Na startu se pravidelně objevuje <strong>více než 120 posádek</strong>.</li>
        <li>Díky podpoře města, sponzorů a hlavně našich členů má závod prestiž a tradici.</li>
      </ul>
      <p class="onas-text autoShow">
        A kdo za tím vším stojí? 👉 Bez 150 pořadatelů, hasičů, zdravotníků 
        a dobrovolníků by to prostě nešlo.
      </p>
    </section>

    <section class="onas-section">
      <h2 class="onas-subtitle">A to není všechno!</h2>
      <ul class="onas-list">
        <li>🚗 Rodinné soutěže <em>„Výlet za tajným cílem“</em> zakončené večerním posezením.</li>
        <li>🚌 Každoroční zájezdy na zajímavá místa.</li>
      </ul>
    </section>

    <section class="onas-section">
      <h2 class="onas-subtitle">Chcete se přidat?</h2>
      <p class="onas-text autoShow">
        Hledáme nové tváře – nejen řidiče, ale i ty, kdo umí fotit, natáčet, psát, propagovat, 
        nebo rozumí internetu a technice. 👉 Každý, kdo má rád auta a dobrou partu, 
        má u nás dveře otevřené!
      </p>
    </section>

    <div class="onas-contact" id="kontakt">
      <p>📌 Více na našem webu: </p>
      <p>📞 Kontakt: <strong>Jan Vlček – 604 243 278</strong></p>
    </div>
  </div>
  </div>
</div>
<footer class="footer">
  <div class="footer-content">
    <p>Stránku vytvořili <strong>Miroslav Blecha</strong> a <strong>Dan Čejka</strong></p>
    <p>&copy; 2025 Auto sport klub Hořovice – Všechna práva vyhrazena</p>
  </div>
</footer>





</body>
</html>