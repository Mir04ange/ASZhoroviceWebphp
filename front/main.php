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
    <title>ASK Hořovice</title>
    <script src="\front\js\cursor.js"></script>
    <link rel="stylesheet" href="./css/btn.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/Carousel.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./scss/footer.scss">
    <link rel="stylesheet" href="./css/mujtext.css">
    <link rel="stylesheet" href="./css/navbars.css">
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

<!-- Carousel -->
<div class="container-fluid px-0 mt-5 pt-5">
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">
      <?php foreach($carousel_paths as $index => $img): ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
          <img class="d-block w-100 carousel-img" src="<?php
            if (filter_var($img, FILTER_VALIDATE_URL)) {
              echo $img;
            } else {
              echo './uploads/carousel/' . $img;
            }
          ?>" alt="Item <?= $index+1 ?>">
        </div>
      <?php endforeach; ?>
    </div>

<!-- Carousel Controls -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-arrow">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
      <polyline points="15 18 9 12 15 6"></polyline>
    </svg>
  </span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-arrow">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
      <polyline points="9 6 15 12 9 18"></polyline>
    </svg>
  </span>
</button>


  </div>
</div>

<!-- Admin formuláře -->
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
<div class="container mt-4">
    <h5>Upravit Carousel</h5>
    <form action="update_carousel.php" method="POST" enctype="multipart/form-data">
    <?php for($i=1; $i<=5; $i++): ?>
      <label class="CarouselImgText">Obrázek <?= $i ?>:</label>
      <input type="file" name="carousel_img<?= $i ?>" accept="image/*" class="form-control mb-2">
      <input type="text" name="carousel_url<?= $i ?>" placeholder="nebo vložte URL obrázku" class="form-control mb-2">
    <?php endfor; ?>
        <button type="submit" class="btn btn-primary">Uložit obrázky</button>
    </form>

  <h5 class="mt-4 autoShow">Upravit datum závodu</h5>
  <form action="../back/update_date.php" method="POST">
    <input type="date" name="race_date" class="form-control" value="<?= $race_date ?>" required>
    <button type="submit" class="btn btn-primary mt-2">Uložit datum</button>
  </form>
  <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger mt-2"><?= htmlspecialchars($_SESSION['error']); ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success mt-2"><?= htmlspecialchars($_SESSION['success']); ?></div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>
</div>
<?php endif; ?>

<!-- Přihlášení do závodu + datum -->
<div class="buttons mt-5">
  <span class="btn-black">Datum závodu: <?= $race_date ?></span>
  <a href="./prihlaska.php" class="btn-red">Přihlásit se do závodu</a>
</div>

<!-- Textové pole -->
<div class="container" id="textx">
  <div class="center-text">
      <div class="onas-wrapper">
    <h1 class="onas-title">Auto sport klub Hořovice</h1>

    <section class="onas-section">
      <h2 class="onas-subtitle">Motoristé, připravte se na start! 🏁</h2>
      <p class="onas-text autoShow">
        Máte slabost pro auta, závody a pořádný motoristický adrenalin? 
        Chcete zažít rallye z první řady a podílet se na akcích, kde se točí volanty, 
        pálí gumy a tleská stovky fanoušků? Pak jste na správné adrese – 
        <span class="onas-highlight">Auto sport klub Hořovice</span>!
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
<?php
$registrace = [];
$db_error = null;

// Suppress fatal errors on include
@include './../back/Database/db.php';

try {
    if (isset($conn) && $conn) {
        if ($conn->connect_error) {
            throw new Exception("Chyba připojení k DB: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM prihlasky ORDER BY datum_prihlaseni DESC";
        $result = $conn->query($sql);

        if (!$result) {
            throw new Exception("Chyba při načítání dat: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            $registrace[] = $row;
        }
    } else {
        $db_error = "Databáze není dostupná, ale stránka se načetla.";
    }
} catch (Exception $e) {
    $db_error = $e->getMessage();
} finally {
    if (isset($conn) && $conn) $conn->close();
}
?>

<div class="container mt-5">
    <h3 class="text-center text-light">Přihlášky</h3>

    <?php if ($db_error): ?>
        <div class="alert alert-warning" role="alert">
            <?= htmlspecialchars($db_error) ?>
        </div>
    <?php endif; ?>

    <?php if (count($registrace) === 0): ?>
        <div class="alert alert-info" role="alert">
            Žádné přihlášky zatím nejsou.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Team</th>
                        <th>Řidič</th>
                        <th>Spolujezdec</th>
                        <th>Vozidlo (značka, typ)</th>
                        <th>Datum závodu</th>
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                            <th>Datum přihlášení</th>
                            <th>Zaplaceno</th>
                            <th>Stažení</th>
                        <?php endif; ?>
                    </tr>
                </thead>
              <tbody>
<?php
$today = date("Y-m-d");
if (strtotime($today) > strtotime($race_date . ' +1 day')) {
    // Den po závodě – smažeme všechny přihlášky
    @include './../back/Database/db.php';
    if (isset($conn) && $conn) {
        $conn->query("DELETE FROM prihlasky");
        $conn->close();
        echo '<tr><td colspan="10" class="text-center text-warning">Závod skončil, přihlášky byly smazány.</td></tr>';
    }
} else {
    foreach ($registrace as $index => $data): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($data['team'] ?? '-') ?></td>
            <td><?= htmlspecialchars($data['ridic_jmeno'] ?? '-') ?></td>
            <td><?= htmlspecialchars($data['spoluj_jmeno'] ?? '-') ?></td>
            <td><?= htmlspecialchars($data['auto_znacka'] ?? '-') ?> / <?= htmlspecialchars($data['auto_typ'] ?? '-') ?></td>
            <td><?= htmlspecialchars($data['datum_zavodu'] ?? '-') ?></td>

            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <td><?= htmlspecialchars($data['datum_prihlaseni'] ?? '-') ?></td>
                <td><?= $data['zaplaceno'] ? 'Ano' : 'Ne' ?></td>
                <td>
                    <form method="POST" action="../back/delete_prihlaska.php" onsubmit="return confirm('Opravdu chcete tuto přihlášku smazat?');">
                        <input type="hidden" name="id_prihlaska" value="<?= htmlspecialchars($data['id_prihlaska']) ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Odebrat</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach;
}
?>
</tbody>
            </table>
        </div>
    <?php endif; ?>
</div>



<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <form method="POST" action="download_pdf.php">
        <input type="hidden" name="all" value="1">
        <button class="btn btn-success mt-2">Stáhnout všechny přihlášky</button>
    </form>
<?php endif; ?>


<footer class="footer">
  <div class="footer-content">
    <p>Stránku vytvořili <strong>Miroslav Blecha</strong> a <strong>Dan Čejka</strong></p>
    <p>&copy; 2025 Auto sport klub Hořovice – Všechna práva vyhrazena</p>
  </div>
</footer>





</body>
</html>