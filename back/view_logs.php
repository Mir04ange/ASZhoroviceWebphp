<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Přístup zamítnut. Pouze administrátoři mohou vidět logy.');
}

require_once './Database/db.php';
require_once './Database/AdminLogger.php';

$logger = new AdminLogger($conn, $_SESSION['user_id'], $_SESSION['username']);
$logger->log('VIEW_LOGS', 'Admin accessed logs page', 'success');

$filter_action = isset($_GET['action']) ? $_GET['action'] : null;
$logs = $logger->getLogs(200, $filter_action);
$actions_list = array('LOGIN', 'LOGOUT', 'CAROUSEL_UPDATE', 'RACE_DATE_UPDATE', 'REGISTRATION_DELETE', 'PAYMENT_STATUS_UPDATE', 'LOGIN_FAILED', 'VIEW_LOGS');

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs - ASK Hořovice</title>
    <link rel="stylesheet" href="/front/css/backLogsStyle.css">
    <link rel="stylesheet" href="../front/node_modules/bootstrap/dist/css/bootstrap.min.css">
    
</head>
<body>

<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Admin Logs - ASK Hořovice</span>
        <a href="../front/main.php" class="btn btn-outline-light btn-sm prettier">Zpět na Main</a>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Admin Activity Logs</h2>

    <div class="filter-section ">
        <h5>Filtrovat podle akce:</h5>
        <div class="btn-group mb-3 " role="group">
            <a href="?action=" class="btn btn-outline-light prettier <?php echo $filter_action === null ? 'active' : ''; ?>">Vše</a>
            <?php foreach ($actions_list as $act): ?>
                <a href="?action=<?php echo urlencode($act); ?>" class="btn btn-outline-light <?php echo $filter_action === $act ? 'active' : ''; ?>">
                    <?php echo $act; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (empty($logs)): ?>
        <div class="alert alert-info">
            Žádné logy k zobrazení.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
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
                            <td><?php echo $log['id_log']; ?></td>
                            <td><?php echo date('d.m.Y H:i:s', strtotime($log['timestamp'])); ?></td>
                            <td><?php echo htmlspecialchars($log['username']); ?></td>
                            <td>
                                <strong><?php echo htmlspecialchars($log['action']); ?></strong>
                            </td>
                            <td>
                                <small><?php echo htmlspecialchars(substr($log['action_details'], 0, 50)); ?></small>
                                <?php if (strlen($log['action_details']) > 50): ?>
                                    <br/><small class="text-muted">...</small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?php echo $log['status'] === 'success' ? 'success' : 'failed'; ?>">
                                    <?php echo ucfirst($log['status']); ?>
                                </span>
                            </td>
                            <td>
                                <small><?php echo htmlspecialchars($log['ip_address']); ?></small>
                            </td>
                        </tr>
                        <?php if (!empty($log['error_message'])): ?>
                            <tr class="bg-dark">
                                <td colspan="7">
                                    <small class="text-danger">
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
            <p class="text-muted">Zobrazeno <?php echo count($logs); ?> logů. Nejnovější logy jsou nahoře.</p>
        </div>
    <?php endif; ?>
</div>

<script src="../front/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php $conn->close(); ?>
