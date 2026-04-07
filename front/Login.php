<?php session_start(); ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení | ASK Hořovice</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/premium-design.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .login-card {
            background: var(--bg-glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-light);
            border-radius: 30px;
            padding: 3rem;
            box-shadow: var(--shadow-xl);
            animation: fadeInUp 0.6s ease-out;
            transition: all var(--transition-base);
        }
        
        .login-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-xl), var(--shadow-glow);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 10px 25px rgba(230, 57, 70, 0.3);
        }

        .login-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--text-primary), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .form-group-login {
            margin-bottom: 1.5rem;
        }

        .form-label-login {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.75rem;
            display: block;
        }

        .form-control-login {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-light);
            color: var(--text-primary);
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all var(--transition-fast);
        }

        .form-control-login::placeholder {
            color: var(--text-tertiary);
        }

        .form-control-login:focus {
            background: rgba(0, 0, 0, 0.4);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
            outline: none;
            animation: focusPulse 0.3s ease-out;
        }
        
        @keyframes focusPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.3);
            }
            100% {
                box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
            }
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 12px 32px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all var(--transition-base);
            box-shadow: 0 10px 25px rgba(230, 57, 70, 0.3);
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left var(--transition-base);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(230, 57, 70, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }
        
        .btn-login {
            animation: slideInUp 0.5s ease-out 0.3s both;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: color var(--transition-fast);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-link a:hover {
            color: var(--primary);
        }

        .alert-login {
            background: rgba(230, 57, 70, 0.1);
            border: 1px solid rgba(230, 57, 70, 0.3);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            font-size: 0.95rem;
            animation: slideInUp 0.4s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .login-wrapper {
                padding: 1rem;
            }

            .login-card {
                padding: 2rem;
                border-radius: 20px;
            }

            .login-title {
                font-size: 1.5rem;
            }

            .login-logo {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">🏁</div>
            <h1 class="login-title">Přihlášení</h1>
            <p class="login-subtitle">Přihlaste se do vašeho účtu</p>
        </div>

        <?php if (isset($_SESSION["error"])): ?>
            <div class="alert-login">
                ⚠️ <?= htmlspecialchars($_SESSION["error"]) ?>
                <?php unset($_SESSION["error"]); ?>
            </div>
        <?php endif; ?>

        <form action="./../back/login.php" method="POST">
            <div class="form-group-login">
                <label class="form-label-login">Uživatelské jméno</label>
                <input type="text" name="username" class="form-control-login" placeholder="Vaše uživatelské jméno" required autofocus>
            </div>

            <div class="form-group-login">
                <label class="form-label-login">Heslo</label>
                <input type="password" name="password" class="form-control-login" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">Přihlásit se</button>
        </form>

        <div class="back-link">
            <a href="./main.php">
                <span>←</span>
                <span>Zpět na hlavní stránku</span>
            </a>
        </div>
    </div>
</div>

</body>
</html>
