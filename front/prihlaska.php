<?php
session_start();

$race_date = file_exists("race_date.txt") ? file_get_contents("race_date.txt") : "2025-01-01";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST;
    $data["datum_zavodu"] = $race_date;
    $data["datum_prihlaseni"] = date("Y-m-d H:i:s");
    $_SESSION['datum_zavodu'] = $race_date;

    $_SESSION["success"] = "Přihláška byla úspěšně odeslána!";
    header("Location: ./../front/main.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení do závodu | ASK Hořovice</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/premium-design.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 100px;
        }

        .form-page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .form-page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--text-primary), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-page-header p {
            font-size: 1.1rem;
            color: var(--text-secondary);
        }

        .race-date-badge {
            display: inline-block;
            background: linear-gradient(135deg, rgba(230, 57, 70, 0.2), rgba(230, 57, 70, 0.1));
            border: 1px solid rgba(230, 57, 70, 0.3);
            color: var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            margin-top: 1rem;
        }

        .form-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .form-section-premium {
            background: var(--bg-glass);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-light);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            transition: all var(--transition-base);
        }

        .form-section-premium:hover {
            background: var(--bg-glass-hover);
            border-color: var(--primary);
            box-shadow: var(--shadow-md), var(--shadow-glow);
        }

        .form-section-premium h3 {
            color: var(--primary);
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-left: 1rem;
            border-left: 4px solid var(--primary);
            position: relative;
        }

        .form-row-premium {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group-premium {
            display: flex;
            flex-direction: column;
        }

        .form-label-premium {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.75rem;
        }

        .form-control-premium {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-light);
            color: var(--text-primary);
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all var(--transition-fast);
        }

        .form-control-premium::placeholder {
            color: var(--text-tertiary);
        }

        .form-control-premium:focus {
            background: rgba(0, 0, 0, 0.4);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
            outline: none;
        }

        .form-check-premium {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .form-check-input-premium {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-medium);
            border-radius: 6px;
            background: transparent;
            cursor: pointer;
            transition: all var(--transition-fast);
            flex-shrink: 0;
            margin-top: 2px;
            accent-color: var(--primary);
        }

        .form-check-input-premium:hover {
            border-color: var(--primary);
        }

        .form-check-input-premium:checked {
            background: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label-premium {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-submit-premium {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all var(--transition-base);
            box-shadow: 0 10px 25px rgba(230, 57, 70, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-submit-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left var(--transition-base);
        }

        .btn-submit-premium:hover::before {
            left: 100%;
        }

        .btn-submit-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(230, 57, 70, 0.4);
        }

        .btn-back-premium {
            background: var(--bg-glass);
            border: 2px solid var(--border-medium);
            color: var(--text-primary);
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all var(--transition-base);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back-premium:hover {
            background: var(--bg-glass-hover);
            border-color: var(--primary);
            color: var(--primary);
        }

        .declaration-text {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            border-left: 4px solid var(--primary);
        }

        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }

            .form-page-header h1 {
                font-size: 1.75rem;
            }

            .form-row-premium {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-submit-premium,
            .btn-back-premium {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="./main.php">
            <img src="\SVGLOGA\sadasdsd.svg" alt="ASK Hořovice" style="height: 50px;">
            <span>ASK Hořovice</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <div class="toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="./main.php">Domů</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Přihlášení</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<div class="section-container">
    <div class="form-container">
        <div class="form-page-header">
            <h1>Přihlášení do závodu</h1>
            <p>Vyplňte prosím všechny požadované údaje</p>
            <div class="race-date-badge">
                📅 Datum závodu: <strong><?= $race_date ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Form -->
<div class="section-container">
    <div class="form-container">
        <form method="POST" action="./../back/Database/prihlaskaUploadToDB.php">

            <!-- TEAM -->
            <div class="form-section-premium">
                <h3>🏢 Team</h3>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Název a místo působení (obec) *</label>
                        <input type="text" class="form-control-premium" name="team" required>
                    </div>
                </div>
            </div>

            <!-- ŘIDIČ -->
            <div class="form-section-premium">
                <h3>🚗 Řidič</h3>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Jméno a příjmení *</label>
                        <input type="text" class="form-control-premium" name="ridic_jmeno" required>
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Číslo občanského průkazu</label>
                        <input type="text" class="form-control-premium" name="ridic_op">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Rodné číslo</label>
                        <input type="text" class="form-control-premium" name="ridic_rc">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Číslo řidičského průkazu</label>
                        <input type="text" class="form-control-premium" name="ridic_rp">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Bydliště / PSČ</label>
                        <input type="text" class="form-control-premium" name="ridic_adresa">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Telefon / e-mail</label>
                        <input type="text" class="form-control-premium" name="ridic_kontakt">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Pojišťovna pro úrazové pojištění</label>
                        <input type="text" class="form-control-premium" name="ridic_pojistovna">
                    </div>
                </div>
            </div>

            <!-- SPOLUJEZDEC -->
            <div class="form-section-premium">
                <h3>👥 Spolujezdec</h3>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Jméno a příjmení</label>
                        <input type="text" class="form-control-premium" name="spoluj_jmeno">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Číslo občanského průkazu</label>
                        <input type="text" class="form-control-premium" name="spoluj_op">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Rodné číslo</label>
                        <input type="text" class="form-control-premium" name="spoluj_rc">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Číslo řidičského průkazu</label>
                        <input type="text" class="form-control-premium" name="spoluj_rp">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Bydliště / PSČ</label>
                        <input type="text" class="form-control-premium" name="spoluj_adresa">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Telefon / e-mail</label>
                        <input type="text" class="form-control-premium" name="spoluj_kontakt">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Pojišťovna pro úrazové pojištění</label>
                        <input type="text" class="form-control-premium" name="spoluj_pojistovna">
                    </div>
                </div>
            </div>

            <!-- VOZIDLO -->
            <div class="form-section-premium">
                <h3>🏎️ Vozidlo</h3>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Třída</label>
                        <input type="text" class="form-control-premium" name="auto_trida">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">SPZ</label>
                        <input type="text" class="form-control-premium" name="auto_spz">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Tovární značka</label>
                        <input type="text" class="form-control-premium" name="auto_znacka">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Typ</label>
                        <input type="text" class="form-control-premium" name="auto_typ">
                    </div>
                    <div class="form-group-premium">
                        <label class="form-label-premium">Obsah</label>
                        <input type="text" class="form-control-premium" name="auto_obsah">
                    </div>
                </div>
                <div class="form-row-premium">
                    <div class="form-group-premium">
                        <label class="form-label-premium">Pojišťovna pro pojištění odpovědnosti</label>
                        <input type="text" class="form-control-premium" name="auto_pojistovna">
                    </div>
                </div>
            </div>

            <!-- DALŠÍ INFORMACE -->
            <div class="form-section-premium">
                <h3>📝 Další informace</h3>
                <div class="form-group-premium">
                    <label class="form-label-premium">Poznámky o posádce</label>
                    <textarea class="form-control-premium" name="info" rows="4" placeholder="Napište jakékoli dodatečné informace..."></textarea>
                </div>
            </div>

            <!-- ČESTNÉ PROHLÁŠENÍ -->
            <div class="form-section-premium">
                <h3>⚖️ Čestné prohlášení</h3>
                <div class="declaration-text">
                    <p>
                        Prohlašuji, že mnou uvedené údaje jsou pravdivé a že jsem obeznámen s pravidly soutěže,
                        kterou absolvuji na vlastní nebezpečí, vlastní náklady a s povinným pojištěním.
                        Souhlasím se zpracováním osobních údajů pro potřeby ASK Hořovice.
                    </p>
                </div>
                <div class="form-check-premium">
                    <input class="form-check-input-premium" type="checkbox" name="souhlas" id="souhlas" required>
                    <label class="form-check-label-premium" for="souhlas">
                        Souhlasím s podmínkami a čestně prohlašuji, že všechny údaje jsou správné
                    </label>
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="form-actions">
                <button type="submit" class="btn-submit-premium">Odeslat přihlášku</button>
                <a href="./main.php" class="btn-back-premium">← Zpět</a>
            </div>
        </form>
    </div>
</div>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
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
