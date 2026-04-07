<?php session_start(); ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení | ASK Hořovice</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/modern-redesign.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: radial-gradient(circle at center, #1a1a1a 0%, #0b0c10 100%);
        }
        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            padding: 3rem;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .login-title {
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            background: linear-gradient(to right, #fff, var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h1 class="login-title">Přihlášení</h1>
    
    <form action="./../back/login.php" method="POST">
        <div class="mb-3">
            <label class="form-label text-secondary small text-uppercase fw-bold">Uživatel</label>
            <input type="text" name="username" class="form-control" placeholder="Uživatelské jméno" required>
        </div>
        <div class="mb-4">
            <label class="form-label text-secondary small text-uppercase fw-bold">Heslo</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        
        <button type="submit" class="btn-red w-100 border-0 mb-3">Přihlásit se</button>
        
        <div class="text-center">
            <a href="../front/main.php" class="text-secondary text-decoration-none small hover-white">← Zpět na hlavní stránku</a>
        </div>

        <?php
            if (isset($_SESSION["error"])) {
                echo "<div class='alert alert-danger mt-3 py-2 small text-center'>" . htmlspecialchars($_SESSION["error"]) . "</div>";
                unset($_SESSION["error"]);
            }
        ?>
    </form>
</div>

</body>
</html>
