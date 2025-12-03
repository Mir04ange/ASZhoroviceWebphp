<?php

class AdminLogger {
    private $conn;
    private $user_id;
    private $username;

    public function __construct($conn, $user_id, $username) {
        $this->conn = $conn;
        $this->user_id = $user_id;
        $this->username = $username;
    }

    public function log($action, $action_details = '', $status = 'success', $error_message = '') {
        $ip_address = $this->getClientIP();
        $user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500);

        $stmt = $this->conn->prepare(
            'INSERT INTO admin_logs (user_id, username, action, action_details, ip_address, user_agent, status, error_message) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
        );

        if (!$stmt) {
            error_log('Logger prepare error: ' . $this->conn->error);
            return false;
        }

        $user_id = $this->user_id ?? null;

        $stmt->bind_param(
            'isssssss',
            $user_id,
            $this->username,
            $action,
            $action_details,
            $ip_address,
            $user_agent,
            $status,
            $error_message
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    private function getClientIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        }
        return trim($ip);
    }

    public function getLogs($limit = 100, $action = null) {
        $sql = 'SELECT * FROM admin_logs WHERE 1=1';
        $params = array();
        $types = '';

        if ($action) {
            $sql .= ' AND action = ?';
            $params[] = $action;
            $types .= 's';
        }

        $sql .= ' ORDER BY timestamp DESC LIMIT ?';
        $params[] = $limit;
        $types .= 'i';

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return array();
        }

        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $logs = array();

        while ($row = $result->fetch_assoc()) {
            $logs[] = $row;
        }

        $stmt->close();
        return $logs;
    }

    public function getUserLogs($user_id, $limit = 50) {
        $stmt = $this->conn->prepare(
            'SELECT * FROM admin_logs WHERE user_id = ? ORDER BY timestamp DESC LIMIT ?'
        );

        $stmt->bind_param('ii', $user_id, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $logs = [];

        while ($row = $result->fetch_assoc()) {
            $logs[] = $row;
        }

        $stmt->close();
        return $logs;
    }
}

?>
