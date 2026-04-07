<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Přístup zamítnut. Pouze administrátoři mohou vidět logy.');
}

require_once './Database/db.php';
require_once './Database/AdminLogger.php';

$logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);

$filter_action = isset($_GET['action']) ? $_GET['action'] : null;
$logs = $logger->getLogs(200, $filter_action);
$actions_list = array('LOGIN', 'LOGOUT', 'CAROUSEL_UPDATE', 'RACE_DATE_UPDATE', 'REGISTRATION_DELETE', 'PAYMENT_STATUS_UPDATE', 'LOGIN_FAILED', 'VIEW_LOGS');

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logy - ASK Hořovice</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front/css/premium-design.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- ============================================
     NAVBAR
     ============================================ -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="../front/main.php">
            <img src="\SVGLOGA\sadasdsd.svg" alt="ASK Hořovice" style="height: 50px;">
            <span>Logy</span>
        </a>

        <a href="../front/main.php" class="btn-secondary-custom navbar-back-btn">← Zpět</a>
    </div>
</nav>

<!-- ============================================
     LOGS CONTENT
     ============================================ -->
<div class="section-container">
    <div class="content-wrapper">
        <div class="section-title">
            <h2>Admin Activity Logs</h2>
        </div>

        <!-- Filter Controls -->
        <div class="card-premium mb-4">
            <h4 class="text-primary mb-3">Filtrovat podle akce:</h4>
            <div class="filter-buttons">
                <a href="?action=" class="filter-btn <?php echo $filter_action === null ? 'active' : ''; ?>">Vše</a>
                <?php foreach ($actions_list as $act): ?>
                    <a href="?action=<?php echo urlencode($act); ?>" class="filter-btn <?php echo $filter_action === $act ? 'active' : ''; ?>">
                        <?php echo $act; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Logs Table -->
        <?php if (empty($logs)): ?>
            <div class="card-premium text-center p-5">
                <p class="text-secondary">Žádné logy k zobrazení.</p>
            </div>
        <?php else: ?>
            <div class="table-wrapper">
                <table class="registrations-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Čas</th>
                            <th>Uživatel</th>
                            <th>Akce</th>
                            <th>Detaily</th>
                            <th>Status</th>
                            <th>IP Adresa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($log['id_log']); ?></td>
                                <td><?php echo date('d.m.Y H:i:s', strtotime($log['timestamp'])); ?></td>
                                <td><?php echo htmlspecialchars($log['username']); ?></td>
                                <td>
                                    <strong><?php echo htmlspecialchars($log['action']); ?></strong>
                                </td>
                                <td>
                                    <small><?php echo htmlspecialchars(substr($log['action_details'], 0, 50)); ?></small>
                                    <?php if (strlen($log['action_details']) > 50): ?>
                                        <br/><small class="text-tertiary">...</small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="log-status log-status-<?php echo $log['status'] === 'success' ? 'success' : 'failed'; ?>">
                                        <?php echo $log['status'] === 'success' ? '✓ Úspěch' : '✗ Chyba'; ?>
                                    </span>
                                </td>
                                <td>
                                    <small class="text-tertiary"><?php echo htmlspecialchars($log['ip_address']); ?></small>
                                </td>
                            </tr>
                            <?php if (!empty($log['error_message'])): ?>
                                <tr>
                                    <td colspan="7">
                                        <small class="text-danger" style="padding: 0.5rem;">
                                            Chyba: <?php echo htmlspecialchars($log['error_message']); ?>
                                        </small>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <p class="text-tertiary" style="font-size: 0.9rem;">Zobrazeno <?php echo count($logs); ?> logů. Nejnovější logy jsou nahoře.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer style="background: rgba(0, 0, 0, 0.3); border-top: 1px solid rgba(255, 255, 255, 0.05); padding: 2rem 0; margin-top: 4rem;">
    <div class="content-wrapper text-center">
        <p class="text-secondary mb-2">&copy; 2025 Auto Sport Klub Hořovice. Všechna práva vyhrazena.</p>
    </div>
</footer>

<style>
    .navbar-back-btn {
        padding: 8px 16px;
        white-space: nowrap;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .filter-btn {
        padding: 0.5rem 1rem;
        background: var(--bg-glass);
        border: 1px solid var(--border-medium);
        border-radius: 8px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all var(--transition-fast);
        cursor: pointer;
    }

    .filter-btn:hover {
        background: var(--bg-glass-hover);
        border-color: var(--primary);
        color: var(--primary);
    }

    .filter-btn.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border-color: var(--primary);
        box-shadow: var(--shadow-md), var(--shadow-glow);
    }

    .log-status {
        display: inline-block;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .log-status-success {
        background: rgba(6, 214, 160, 0.2);
        color: var(--success);
        border: 1px solid var(--success);
    }

    .log-status-failed {
        background: rgba(231, 111, 81, 0.2);
        color: var(--danger);
        border: 1px solid var(--danger);
    }
</style>

</body>
</html>

<?php 
if (isset($conn) && $conn) {
    $conn->close();
}
?>
